<?php
include("../includes/conn.php");

// รับค่าจากฟอร์ม
$responsibleFilters = isset($_POST['responsible_filter']) ? $_POST['responsible_filter'] : [];
$roomFilters = isset($_POST['room_filter']) ? $_POST['room_filter'] : [];
$startYear = isset($_POST['start_year']) && !empty($_POST['start_year']) ? intval($_POST['start_year']) : null;
$endYear = isset($_POST['end_year']) && !empty($_POST['end_year']) ? intval($_POST['end_year']) : null;

// ฟังก์ชันแปลงวันที่
function convertToGregorian($thaiDate) {
    if (!$thaiDate) return null;
    if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $thaiDate)) return null;
    $parts = explode("/", $thaiDate);
    $year = $parts[2] - 543;
    return "$year-{$parts[1]}-{$parts[0]}";
}

function formatThaiDate($date) {
    if (!$date) return null;
    $parts = explode("/", $date);
    $thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
    $monthName = $thaiMonths[(int)$parts[1] - 1];
    return "{$parts[0]} $monthName " . substr($parts[2], -2);
}

// เงื่อนไข SQL
$responsibleCondition = "";
if (!empty($responsibleFilters)) {
    $responsibleList = implode("','", array_map(fn($i) => mysqli_real_escape_string($con, $i), $responsibleFilters));
    $responsibleCondition = "AND eq.responsible IN ('$responsibleList')";
}

$roomCondition = "";
if (!empty($roomFilters)) {
    $roomList = implode("','", array_map(fn($i) => mysqli_real_escape_string($con, $i), $roomFilters));
    $roomCondition = "AND nr.room IN ('$roomList')";
}

$yearCondition = "";
if ($startYear && $endYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) BETWEEN $startYear AND $endYear";
} elseif ($startYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) >= $startYear";
} elseif ($endYear) {
    $yearCondition = "AND YEAR(STR_TO_DATE(eq.date2, '%d/%m/%Y')) <= $endYear";
}

// SQL ดึงข้อมูล
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

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $age = '-';
    if ($row['date2']) {
        $convertedDate = convertToGregorian($row['date2']);
        if ($convertedDate) {
            try {
                $date_now = new DateTime();
                $received_date = new DateTime($convertedDate);
                $interval = $date_now->diff($received_date);
                $age = $interval->y;
            } catch (Exception $e) {}
        }
    }

    $data[] = [
        'name' => $row['name'],
        'sumnum' => $row['sumnum'],
        'moneynum' => $row['moneynum'],
        'tranfer' => $row['tranfer'],
        'date1Formatted' => formatThaiDate($row['date1']),
        'date2Formatted' => formatThaiDate($row['date2']),
        'money' => $row['money'],
        'num' => $row['num'],
        'price' => $row['price'],
        'normal_count' => $row['normal_count'],
        'damaged_count' => $row['damaged_count'],
        'deteriorated_count' => $row['deteriorated_count'],
        'rooms' => $row['rooms'] ?? 'ไม่มีข้อมูล',
        'responsible' => $row['responsible'],
        'age' => $age
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
