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
	$name = $_POST['name'];
	
	$sql = "UPDATE `receive_transfer` SET `transfer`='$name' WHERE `tran_id` = $eid";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: ../transfer.php' ) ;
?>
</body>
</html>