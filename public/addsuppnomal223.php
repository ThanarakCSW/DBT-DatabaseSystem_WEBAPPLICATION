<?php 
include("../includes/conn.php");

$name = $_POST['name'];
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];
$numend = $_POST['numend'];
$numstart = $_POST['numstart'];
$moneynum = $_POST['moneynum'];
$type = $_POST['select_type'];
$st = $_POST['select_transfer'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$sm = $_POST['select_money'];
$price = $_POST['price'];
$room = $_POST['select_room'];
$rp = $_POST['select_responsible'];
$number = $_POST['number'];



// ตรวจสอบว่าไฟล์ที่อัปโหลดเป็นไฟล์จริงหรือไม่
$myfile=uniqid().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"images/".$myfile);

$sql = "INSERT INTO `eqnomal`(`sumnum`, `name`, `type`, `date1`, `date2`, `money`, `num`, `responsible`, `numstart`, `numend`, `moneynum`, `tranfer`, `price`, `pic`, `num1`, `num2`, `num3`, `num4`) 
        VALUES ('$num1-$num2-$num3-$num4-$numstart', '$name', '$type', '$date1', '$date2', '$sm', '$number', '$rp', '$numstart', '$numend', '$moneynum', '$st', '$price', '$myfile', '$num1', '$num2', '$num3', '$num4')";
// ประมวลผลคำสั่ง SQL
$result = mysqli_query($con, $sql);
$sum_id = mysqli_insert_id($con);



if (isset($_POST['select_room']) && is_array($_POST['select_room'])) {
    // วนลูปเพิ่มข้อมูลไปยังตาราง numroom
    foreach ($_POST['select_room'] as $room) {
        // รับค่าจำนวนจากช่องกรอกจำนวนที่ตรงกับห้องที่เลือก
        $quantity = $_POST["quantity_" . $room];
        
        if ($quantity) {
            // เพิ่มข้อมูลลงในตาราง numroom
            $sql3 = "INSERT INTO `numroom`(`nr`, `room`, `sum_id`) VALUES ('$quantity', '$room', '$sum_id')";
            $result3 = mysqli_query($con, $sql3);
            
            // ตรวจสอบการเพิ่มข้อมูล
            if (!$result3) {
                die("Error in inserting numroom: " . mysqli_error($con));
            }
        }
    }
}
		


// ตรวจสอบหมายเลขเริ่มต้นและหมายเลขสุดท้าย
$start_suffix = (int)substr($numstart, -3); // ดึง 3 หลักท้ายของหมายเลขเริ่มต้น
$end_suffix = (int)substr($numend, -3); // ดึง 3 หลักท้ายของหมายเลขสุดท้าย

// ตรวจสอบว่าหมายเลขเริ่มต้นไม่เกินหมายเลขสุดท้าย
if ($start_suffix > $end_suffix) {
    die("หมายเลขครุภัณฑ์สุดท้ายต้องมากกว่าหรือเท่ากับหมายเลขเริ่มต้น");
}

// สร้างหมายเลขครุภัณฑ์จากหมายเลขเริ่มต้นจนถึงหมายเลขสุดท้าย
$prefix = $num1 . "-" . $num2 . "-" . $num3 . "-" . $num4; // ส่วนต้นของหมายเลข
for ($i = $start_suffix; $i <= $end_suffix; $i++) {
    // สร้างหมายเลขครุภัณฑ์
    $equipment_no = $prefix . "-" . str_pad($i, 3, '0', STR_PAD_LEFT); // เช่น 511-1500-545-020

    // เพิ่มครุภัณฑ์ใหม่ลงในตาราง equipments
    $sql = "INSERT INTO `equipments`(`eq_code`, `sum_id`) VALUES ('$equipment_no','$sum_id')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error in inserting data: " . mysqli_error($con));
    }

    // ดึง ID ของครุภัณฑ์ที่เพิ่มล่าสุด
    $eq_id = mysqli_insert_id($con);

    // เพิ่มการตรวจครั้งแรกในตาราง heleqnomal
    $current_date = date('Y-m-d'); // วันที่ปัจจุบัน
    $sql = "INSERT INTO `heleqnomal`(`eq_id`, `hel`, `date`) VALUES ('$eq_id', 'ปกติ', '$current_date')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error in inserting initial check: " . mysqli_error($con));
    }
}
?>

<?php
header('Location: eqnomal.php');
?>
	