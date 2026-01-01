<?php include("../../../../includes/conn.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$eid = $_GET['eid'];
	
	$sql = "DELETE FROM `receive_transfer` WHERE `tran_id` = $eid";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: ../transfer.php' ) ;
?>
</body>
</html>