<?php include("../includes/conn.php"); ?>

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
	
	$sql = "UPDATE `responsible` SET `responsible`='$name' WHERE `res_id` = $eid";
	$result = mysqli_query($con,$sql);
	?>
	<?php
  header( 'Location: responsible.php' ) ;
?>
</body>
</html>