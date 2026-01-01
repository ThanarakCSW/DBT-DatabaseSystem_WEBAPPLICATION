<?php include("../includes/conn.php"); ?>
<?php 

$eid=$_GET['eid'];

$date=$_POST['date'];


$sql3="SELECT * FROM `equipments_low` WHERE `sum_id`=$eid";
$result3=mysqli_query($con,$sql3);
if(mysqli_num_rows($result3)>0){
	while($row3=mysqli_fetch_assoc($result3)){
		


$rrr=$row3['eq_id'];
$radio=$_POST['radio'.$rrr];


$sql="INSERT INTO `heleqlow`(`eq_id`, `hel`, `date`) VALUES ('$rrr','$radio','$date')";
$result=mysqli_query($con,$sql);

$sql2="UPDATE `equipments_low` SET `hel`='$radio' WHERE `eq_id`=$rrr";
$result2=mysqli_query($con,$sql2);

	}
	
	
}
 header( "Location: checkeqlow.php?eid=$eid" ) ;

?>

 
