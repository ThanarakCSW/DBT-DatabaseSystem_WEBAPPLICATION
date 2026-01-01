<?php
include("../includes/conn.php");
$eid=$_GET['eid'];
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
$rp = $_POST['select_responsible'];
$number = $_POST['number'];

// อัปเดตข้อมูลใน `eqnomal`
$sql = "UPDATE `eqnomal` SET `sumnum`='$num1-$num2-$num3-$num4-$numstart',`name`='$name',`type`='$type',`date1`='$date1',`date2`='$date2',`money`='$sm',`num`='$number',`responsible`='$rp',`numstart`='$numstart',`numend`='$numend',`moneynum`='$moneynum',`tranfer`='$st',`price`='$price',`num1`='$num1',`num2`='$num2',`num3`='$num3',`num4`='$num4' WHERE `sum_id`=$eid";
$result = mysqli_query($con, $sql);

$sql2 = "SELECT * FROM `numroom` WHERE `sum_id`=$eid";
$result2 = mysqli_query($con, $sql2);
if(mysqli_num_rows($result2)>0){
while($row2 = mysqli_fetch_assoc($result2)){


$room3=$row2['nr_id'];
$editroom=$_POST['editroom'.$room3];

}
}

$sql3 = "UPDATE `numroom` SET `nr`='$editroom' WHERE `sum_id`=$eid";
$result3 = mysqli_query($con, $sql3);

if (isset($_POST['select_room']) && is_array($_POST['select_room'])) {
    // ขั้นตอนที่ 1: ลบข้อมูลที่ไม่ได้เลือกออกจาก numroom
    $sql_delete = "DELETE FROM numroom WHERE sum_id = '$eid' AND room NOT IN ('" . implode("','", $_POST['select_room']) . "')";
    $result_delete = mysqli_query($con, $sql_delete);
    if (!$result_delete) {
        die("Error in deleting rooms from numroom: " . mysqli_error($con));
    }

    // ขั้นตอนที่ 2: วนลูปเพิ่มห้องที่เลือกและจำนวนห้องที่กรอก
    foreach ($_POST['select_room'] as $room) {
        $quantity = $_POST["quantity_" . $room];
        
        if ($quantity) {
            // ตรวจสอบห้องใน numroom
            $sql_check = "SELECT * FROM numroom WHERE room = '$room' AND sum_id = '$eid'";
            $result_check = mysqli_query($con, $sql_check);
            
            if (mysqli_num_rows($result_check) > 0) {
                // อัปเดตจำนวนห้อง
                $sql_update = "UPDATE numroom SET nr = '$quantity' WHERE room = '$room' AND sum_id = '$eid'";
                $result_update = mysqli_query($con, $sql_update);
                
                if (!$result_update) {
                    die("Error in updating numroom: " . mysqli_error($con));
                }
            } else {
                // เพิ่มข้อมูลใหม่
                $sql_insert = "INSERT INTO numroom (nr, room, sum_id) VALUES ('$quantity', '$room', '$eid')";
                $result_insert = mysqli_query($con, $sql_insert);
                
                if (!$result_insert) {
                    die("Error in inserting numroom: " . mysqli_error($con));
                }
            }
        }
    }
}
header("Location: eqnomal.php");
?>
