<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname="yamini";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$userid=$_SESSION['userid'];
echo $_POST["booknow"];
if(isset($_POST['booknow'])){
$f=$_POST["flightnumber"];
$c=$_POST["seatavl"];
$h=$_POST["date"];
$p=$_POST["time"];
$sql="INSERT INTO booking (userid, flightnumber, date, time) VALUES('$userid','$f','$h','$p')";
if($conn->query($sql)==TRUE){
$k=$c-1;
$sql2="UPDATE flight SET seatavl=$k WHERE flightnumber='$f' AND date='$h' AND time='$p'";
if($conn->query($sql2)==TRUE){
echo "HURRAY!!Ticket Booked";
header("location: mybookings.php");
	exit;
}
}
else
echo "nope .$sql";
}
$conn->close();
?>