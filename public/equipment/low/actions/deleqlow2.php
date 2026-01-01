<?php include("../../../../includes/conn.php"); ?>
<?php 

$eid=$_GET['eid'];
$sql="DELETE FROM `eqlow` WHERE `sum_id`=$eid";
$result=mysqli_query($con,$sql);




?>
<?php
  header( 'Location: ../eqlow.php' ) ;
?>