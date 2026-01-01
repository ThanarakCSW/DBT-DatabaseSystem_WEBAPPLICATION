<?php include('../includes/conn.php'); 
session_start();

$username=$_POST['username'];

$password=$_POST['password'];



$sql="SELECT * FROM `member` WHERE `m_username`='$username' AND `m_password`='$password'";
$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
	
	$_SESSION['username']= $row['m_username'];
	$_SESSION['name']= $row['m_name'];
	$_SESSION['status']= $row['status'];
	$stu_status=$_SESSION['status'];	
	
	if($stu_status == "982"){
  		header( 'Location: index.php' ) ;
	}else{
		header( 'Location: fail.php' ) ;
	}
}

?>