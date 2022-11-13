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

echo $_POST["delete"];
if(isset($_POST['delete'])){
$f=$_POST["flightnumber"];
$c=$_POST["seatavl"];
$h=$_POST["date"];
$p=$_POST["time"];
$sql="DELETE FROM flight WHERE '$f'=flightnumber AND '$h'=date AND '$p'=time";
if($conn->query($sql)==TRUE){
echo "Deleted Successfully";
header("location: view.php");
	exit;
}
else
echo "nope .$sql";
}
$conn->close();
?>

