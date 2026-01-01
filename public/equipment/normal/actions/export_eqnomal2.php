<?php
include("../../../../includes/conn.php");

// รับค่าจากฟอร์ม
$responsibleFilters = isset($_POST['responsible_filter']) ? $_POST['responsible_filter'] : [];
$roomFilters = isset($_POST['room_filter']) ? $_POST['room_filter'] : [];
$startYear = isset($_POST['start_year']) && !empty($_POST['start_year']) ? intval($_POST['start_year']) : null;
$endYear = isset($_POST['end_year']) && !empty($_POST['end_year']) ? intval($_POST['end_year']) : null;

// สร้างเงื่อนไข SQL
$responsibleCondition = "";
if (!empty($responsibleFilters)) {
    $responsibleList = implode("','", array_map(function ($item) use ($con) {
        return mysqli_real_escape_string($con, $item);
    }, $responsibleFilters));
    $responsibleCondition = "AND eq.responsible IN ('$responsibleList')";
}

$roomCondition = "";
if (!empty($roomFilters)) {
    $roomList = implode("','", array_map(function ($item) use ($con) {
        return mysqli_real_escape_string($con, $item);
    }, $roomFilters));
    $roomCondition = "OR nr.room IN ('$roomList')";
}

$yearCondition = "";
if ($startYear && $endYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) BETWEEN $startYear AND $endYear";
} elseif ($startYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) >= $startYear";
} elseif ($endYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) <= $endYear";
}

$sql = "SELECT eq.*, GROUP_CONCAT(nr.room SEPARATOR ', ') AS rooms 
        FROM eqnomal eq 
        LEFT JOIN numroom nr ON eq.sum_id = nr.sum_id 
        WHERE 1=1 
        $responsibleCondition 
        $roomCondition 
        $yearCondition 
        GROUP BY eq.sum_id";

$result = mysqli_query($con, $sql);

// ตั้งค่าหัวกระดาษให้แสดง PDF
header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=report.pdf");

// เริ่มต้นสร้าง HTML
echo "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan='13' style='text-align: center; font-size: 16px; font-weight: bold;'>รายงานพัสดุคงเหลือ</th>
        </tr>
        <tr>
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
            <th>ห้อง</th>
            <th>ผู้รับผิดชอบ</th>
            <th>อายุ</th>
        </tr>";

// แปลงวันที่ไทย
function formatThaiDate($date) {
    if (!$date) return null;
    $parts = explode("/", $date);
    $day = $parts[0];
    $month = $parts[1];
    $year = $parts[2];
    $thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
    $monthName = $thaiMonths[(int)$month - 1];
    return "$day $monthName " . substr($year, -2);
}

$n = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $date1Formatted = formatThaiDate($row['date1']);
    $date2Formatted = formatThaiDate($row['date2']);
    $rooms = $row['rooms'] ? $row['rooms'] : 'ไม่มีข้อมูล';
    $age = '-';
    if ($row['date2']) {
        try {
            $current_date = new DateTime();
            $date_received = DateTime::createFromFormat('d/m/Y', $row['date2']);
            $interval = $current_date->diff($date_received);
            $age = $interval->y;
        } catch (Exception $e) {}
    }

    echo "<tr>
        <td>" . $n++ . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['sumnum'] . "</td>
        <td>" . $row['moneynum'] . "</td>
        <td>" . $row['tranfer'] . "</td>
        <td>" . $date1Formatted . "</td>
        <td>" . $date2Formatted . "</td>
        <td>" . $row['money'] . "</td>
        <td>" . $row['num'] . "</td>
        <td>" . $row['price'] . "</td>
        <td>" . $rooms . "</td>
        <td>" . $row['responsible'] . "</td>
        <td>" . $age . "</td>
    </tr>";
}

echo "
    </table>
</body>
</html>";
?>
