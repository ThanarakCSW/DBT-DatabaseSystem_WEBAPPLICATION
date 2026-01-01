<?php include("../includes/conn.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	$name = $_POST['name'];
	
	$sql = "INSERT INTO `type`(`type`) VALUES ('$name')";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: type.php' ) ;
?>
</body>
</html>