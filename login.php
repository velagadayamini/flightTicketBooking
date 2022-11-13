<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname="yamini";
$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$userid=$_POST["userid"];
$password=$_POST["password"];
$sql="SELECT * FROM admin WHERE '$userid'=userid and '$password'=password";
$result= $conn->query($sql);
if($result->num_rows>0) 
{	
	$_SESSION['userid'] = $userid;
	unset($userid);
 	header("location: admin.php");
	exit;
}


$sql="SELECT * FROM user WHERE '$userid'=userid and '$password'=password"; 
$result= $conn->query($sql);
if($result->num_rows>0) 
{	
	$_SESSION['userid']=$userid;
	unset($userid);
 	header("location: user.php");
	exit;
}
else 
	die("Connection failed: " . $conn->connect_error);


$conn->close();
?>
