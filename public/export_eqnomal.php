<?php
include("../includes/conn.php");

// รับค่าจากฟอร์ม
$responsibleFilters = isset($_POST['responsible_filter']) ? $_POST['responsible_filter'] : [];
$roomFilters = isset($_POST['room_filter']) ? $_POST['room_filter'] : [];
$startYear = isset($_POST['start_year']) && !empty($_POST['start_year']) ? intval($_POST['start_year']) : null;
$endYear = isset($_POST['end_year']) && !empty($_POST['end_year']) ? intval($_POST['end_year']) : null;


// สร้างเงื่อนไข SQL สำหรับตัวกรอง
// ตัวกรองผู้รับผิดชอบ
$responsibleCondition = "";
if (!empty($responsibleFilters)) {
    $responsibleList = implode("','", array_map(function ($item) use ($con) {
        return mysqli_real_escape_string($con, $item);
    }, $responsibleFilters));
    $responsibleCondition = "AND eq.responsible IN ('$responsibleList')";
}

// ตัวกรองห้อง
$roomCondition = "";
if (!empty($roomFilters)) {
    $roomList = implode("','", array_map(function ($item) use ($con) {
        return mysqli_real_escape_string($con, $item);
    }, $roomFilters));
    $roomCondition = "AND nr.room IN ('$roomList')";
}

// ตัวกรองช่วงปี
$yearCondition = "";
if ($startYear && $endYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) BETWEEN $startYear AND $endYear";
} elseif ($startYear) {
    $yearCondition = "OR YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) >= $startYear";
} elseif ($endYear) {
    $yearCondition = "OR YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) <= $endYear";
}

// สร้าง SQL Query
$sql = "SELECT eq.*, 
        GROUP_CONCAT(DISTINCT nr.room SEPARATOR ', ') AS rooms,
        SUM(CASE WHEN e.hel = 'ปกติ' THEN 1 ELSE 0 END) AS normal_count,
        SUM(CASE WHEN e.hel = 'เสื่อม' THEN 1 ELSE 0 END) AS deteriorated_count,
        SUM(CASE WHEN e.hel = 'ชำรุด' THEN 1 ELSE 0 END) AS damaged_count
        FROM eqnomal eq
    LEFT JOIN numroom nr ON eq.sum_id = nr.sum_id
    LEFT JOIN equipments e ON eq.sum_id = e.sum_id
    WHERE 1=1 
        $responsibleCondition 
        $roomCondition 
        $yearCondition
    GROUP BY eq.sum_id";



$result = mysqli_query($con, $sql);


// กำหนดค่า header สำหรับดาวน์โหลดไฟล์ Excel
// ==== ระบบนับลำดับอัตโนมัติ ====

$reportDate = date("Ymd"); // วันที่ในรูปแบบ YYYYMMDD
$sequenceFile = "report_sequence.json"; // ไฟล์เก็บลำดับรายวัน

// โหลดลำดับจากไฟล์
$sequences = [];
if (file_exists($sequenceFile)) {
    $jsonData = file_get_contents($sequenceFile);
    $sequences = json_decode($jsonData, true);
}

// ถ้าไม่มีวันที่นี้ → เริ่มที่ 1, ถ้ามี → +1
if (!isset($sequences[$reportDate])) {
    $sequences[$reportDate] = 1;
} else {
    $sequences[$reportDate]++;
}

// บันทึกลำดับกลับลงไฟล์
file_put_contents($sequenceFile, json_encode($sequences));

// ใช้ลำดับล่าสุด
$sequence = $sequences[$reportDate];

// สร้างชื่อไฟล์รายงาน
$filename = "รายงานครุภัณฑ์ตามเกณฑ์-{$reportDate}-{$sequence}.xls";

// === ตั้งค่า header สำหรับดาวน์โหลด Excel ===
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");


// สร้างโครงสร้าง HTML Table สำหรับไฟล์ Excel
echo "<table border='1'>";

echo "<tr>";
echo "<th colspan='16' style='text-align: center; font-size: 16px; font-weight: bold;'>รายงานพัสดุคงเหลือ</th>";
echo "</tr>";

echo "<tr>
        <th>ลำดับ</th>
		<th>รายการ</th>
        <th>หมายเลขครุภัณฑ์</th>
        <th>เลขสินทรัพย์</th>
        <th>ที่รับโอน</th>
		<th>วันที่รับโอน</th>
		<th>วันที่ได้มา</th>
		<th>แหล่งเงิน</th>
		<th>จำนวน</th>
        <th>ราคา</th>
		<th>ปกติ</th>
        <th>ชำรุด</th>
        <th>เสื่อม</th>
		<th>ห้อง</th>
		<th>ผู้รับผิดชอบ</th>
		<th>อายุ</th>
      </tr>";

// ฟังก์ชันแปลงวันที่จากรูปแบบ dd/mm/yyyy (พ.ศ.) เป็น yyyy-mm-dd (ค.ศ.)
function convertToGregorian($thaiDate) {
    if (!$thaiDate) return null; // คืนค่า null ถ้าไม่มีวันที่

    // ตรวจสอบรูปแบบวันที่ให้ถูกต้อง (dd/mm/yyyy)
    if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $thaiDate)) {
        return null; // คืนค่า null ถ้ารูปแบบไม่ถูกต้อง
    }

    $parts = explode("/", $thaiDate); // แยกวันที่
    $day = $parts[0];
    $month = $parts[1];
    $year = $parts[2] - 543; // แปลงปี พ.ศ. เป็น ค.ศ.

    // ตรวจสอบว่าวันที่มีค่าถูกต้อง
    if (!checkdate($month, $day, $year)) {
        return null; // คืนค่า null ถ้าวันที่ไม่ถูกต้อง
    }

    return "$year-$month-$day"; // คืนค่าในรูปแบบ yyyy-mm-dd
}

// ฟังก์ชันแปลงวันที่ให้เป็นรูปแบบตัวย่อ (เช่น 25 เม.ย. 51)
// ฟังก์ชันแปลงวันที่ให้เป็นรูปแบบตัวย่อ (เช่น 25 เม.ย. 51)
// ฟังก์ชันแปลงวันที่ให้เป็นรูปแบบตัวย่อ (เช่น 25 เม.ย. 51)
function formatThaiDate($date) {
    // ตรวจสอบก่อนว่ามีวันที่หรือไม่
    if (!$date) return null; // คืนค่า null ถ้าไม่มีวันที่

    // แปลงวันที่จาก dd/mm/yyyy (พ.ศ.) เป็น yyyy-mm-dd (พ.ศ.)
    $parts = explode("/", $date); // แยกวันที่
    $day = $parts[0]; // วัน
    $month = $parts[1]; // เดือน
    $year = $parts[2]; // ปี (พ.ศ.)

    // ชื่อเดือนภาษาไทย
    $thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
    $monthName = $thaiMonths[(int)$month - 1]; // เลือกชื่อเดือนจากตัวเลขเดือน

    // คืนค่าเป็นวันที่ในรูปแบบตัวย่อ
    return "$day $monthName " . substr($year, -2); // แสดงปี 2 หลักสุดท้ายของปี พ.ศ.
}



$n = 1; // ตัวนับลำดับ
while ($row = mysqli_fetch_assoc($result)) {
    // คำนวณอายุจาก date2
    $date2 = $row['date2'];
    $age = '-'; // ค่าเริ่มต้นในกรณีไม่มีข้อมูลวันที่
    if ($date2) {
        $convertedDate = convertToGregorian($date2); // แปลงวันที่
        if ($convertedDate) {
            try {
                $current_date = new DateTime(); // วันที่ปัจจุบัน
                $date_received = new DateTime($convertedDate);
                $interval = $current_date->diff($date_received); // คำนวณความแตกต่าง
                $age = $interval->y; // อายุเป็นจำนวนปี
            } catch (Exception $e) {
                $age = '-'; // กรณีเกิดข้อผิดพลาด
            }
        }
    }

    // แปลงวันที่ date1 และ date2
    $date1Formatted = formatThaiDate($row['date1']);
    $date2Formatted = formatThaiDate($row['date2']);

    echo "<tr>";
    echo "<td>" . $n++ . "</td>";    
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['sumnum'] . "</td>";
    echo "<td style='mso-number-format:\"@\"'>" . $row['moneynum'] . "</td>";
    echo "<td>" . $row['tranfer'] . "</td>";
    echo "<td>" . $date1Formatted . "</td>"; // แสดงวันที่ในรูปแบบตัวย่อ
    echo "<td>" . $date2Formatted . "</td>"; // แสดงวันที่ในรูปแบบตัวย่อ
    echo "<td>" . $row['money'] . "</td>";
    echo "<td>" . $row['num'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['normal_count'] . "</td>"; // แสดงจำนวนครุภัณฑ์ปกติ
    echo "<td>" . $row['damaged_count'] . "</td>"; // แสดงจำนวนครุภัณฑ์ชำรุด
    echo "<td>" . $row['deteriorated_count'] . "</td>"; // แสดงจำนวนครุภัณฑ์เสื่อม
	$rooms = $row['rooms'] ? $row['rooms'] : 'ไม่มีข้อมูล'; // แสดงห้องที่เชื่อมโยงหลายห้อง
    echo "<td>" . $rooms . "</td>";
    echo "<td>" . $row['responsible'] . "</td>";
    echo "<td>" . $age . "</td>"; // แสดงผลอายุ
    echo "</tr>";
}

echo "</table>";
?>
