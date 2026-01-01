<?php
include("../includes/conn.php");

// รับค่าจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportType = isset($_POST['report_type']) ? $_POST['report_type'] : '';

    // ตรวจสอบประเภทรายงาน
    if ($reportType === 'excel') {
        include 'export_eqnomal.php'; // ไฟล์สำหรับสร้างรายงาน Excel
    } elseif ($reportType === 'pdf') {
        include 'export_eqnomal2.php'; // ไฟล์สำหรับสร้างรายงาน PDF
    } else {
        echo "ประเภทรายงานไม่ถูกต้อง";
    }
} else {
    echo "ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง";
}
?>
