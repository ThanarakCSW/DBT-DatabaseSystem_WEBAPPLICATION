<?php include("../../../../includes/conn.php"); ?>
<?php 

$eid=$_GET['eid'];
$radio=$_POST['radio1'];
$date=$_POST['date'];

$sql="UPDATE `heleqnomal` SET `hel`='$radio',`date`='$date' WHERE `hel_id`=$eid";
$result=mysqli_query($con,$sql);
 


?>
<?php
  header( 'Location: ../checkeqnomal2.php' ) ;
?>
