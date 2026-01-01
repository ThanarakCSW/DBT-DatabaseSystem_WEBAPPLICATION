<?php include("../includes/conn.php"); ?>
<?php 

$eid=$_GET['eid'];

$sql2="SELECT `sum_id` FROM `equipments` WHERE `eq_id`=$eid";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);

$sum_id=$row2['sum_id'];


$sql4="SELECT * FROM `eqnomal` WHERE `sum_id`=$sum_id";
$result4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_assoc($result4);

$n=$row4['num']-1;


$sql3="UPDATE `eqnomal` SET `num`='$n' WHERE `sum_id`=$sum_id";
$result3=mysqli_query($con,$sql3);


$sql="DELETE FROM `equipments` WHERE `eq_id`=$eid";
$result=mysqli_query($con,$sql);


?>
<?php
  header( "Location: checkeqnomal.php?eid=$sum_id" ) ;
?>