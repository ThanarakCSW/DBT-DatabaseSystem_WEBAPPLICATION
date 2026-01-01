<?php include("../../../../includes/conn.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	$name = $_POST['name'];
	
	$sql = "INSERT INTO `con_equipment`(`condition`) VALUES ('$name')";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: ../condition.php' ) ;
?>
</body>
</html>