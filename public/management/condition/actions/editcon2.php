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
	
	$sql = "UPDATE `con_equipment` SET `condition`='$name' WHERE `con_id` = $eid";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: ../condition.php' ) ;
?>
</body>
</html>