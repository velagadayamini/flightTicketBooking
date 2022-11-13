<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-image: url(flightmy.jpg);
	background-size: cover;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #000080 ;
    opacity: 0.7;
    height: 80px;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    font-family: serif;
    font-weight: 900;
    text-align: center;
    padding: 27px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    height: 80px;
}

.active {
    height: 80px;
    background-color: white;
	 color:#000080;
}
thead {
	font: bold;
	border: 1px solid black;
}
.table {
	position: absolute;
	width:40%;
	border: 1px solid black;
	text-align: center;
}
th,tr,td {
    border: 1px solid black;
}
</style>
</head>
<body>
<ul>
 	<li><a class="active" href="user.php">Home</a></li>
	<li style="float:left"><a class="active" href="booknow.php">Book Flight</a></li>
	<li style="float:left"><a href="mybookings.php">My Bookings</a></li>
	<li style="float:left"><a class="active" href="logout.php">Logout</a></li>
</ul>
</body>
</html>
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
$userid=$_SESSION['userid'];
$sql="SELECT * FROM booking WHERE '$userid'=userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table" border="0" cellspacing="2" cellpadding="2">
		<thead>
			<th>Flight Number</th>
			<th>Flight Date</th>
			<th>Flight Time</th>
			<th>Booking ID</th>
		</thead>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>
			<td>' . $row["flightnumber"]. '</td>
			<td>' . $row["date"] . '</td>
			<td>' .  $row["time"] . '</td>
			<td>' .  $row["bookingid"] . '</td>
		</tr>';
    }
    echo '</table>';
} else {
    echo "No Bookings";
}
?>