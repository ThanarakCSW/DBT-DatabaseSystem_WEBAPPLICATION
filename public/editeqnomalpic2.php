<?php 
include("../includes/conn.php");

$eid=$_GET['eid'];
// ตรวจสอบว่าไฟล์ที่อัปโหลดเป็นไฟล์จริงหรือไม่
$myfile=uniqid().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"images/".$myfile);

$sql = "UPDATE `eqnomal` SET `pic`='$myfile' WHERE `sum_id`=$eid";
// ประมวลผลคำสั่ง SQL
$result = mysqli_query($con, $sql);


header('Location: eqnomal.php');
?>
	