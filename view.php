<html>
<head>
<style>
body{
	background-image: url(flightlight.jpg);
	background-size: cover;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #000080;
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
    font-weight: 700;
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
table {
	position: absolute;
	width: 35%;
	border: 1px solid black;
	text-align: center;
}
th,tr,td {
	border:1px solid black;
}
</style>
</head>
<body>
<ul>
 	<li><a class="active" href="admin.php">Home</a></li>
	<li style="float:left"><a href="#view">View Flights</a></li>
	<li style="float:left"><a class="active" href="viewbookings.php">View Bookings</a></li>
	<li style="float:left"><a class="active" href="add.php">Add</a></li>
	<li style="float:left"><a class="active" href="delete.php">Delete</a></li>
	<li style="float:left"><a class="active" href="logout.php">Logout</a></li>
</ul>
</body>
</html>
<?php 
$user = "root"; 
$pass = ""; 
$dbname = "yamini"; 
$mysqli = new mysqli("localhost", $user, $pass, $dbname); 
$query = "SELECT * FROM flight";
$result = $mysqli->query($query);
if ($result->num_rows>0 && $result = $mysqli->query($query)) {
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <thead> 
          <th> <font face="Arial">Flight Number</font> </th> 
          <th> <font face="Arial">Seat Availability</font> </th> 
          <th> <font face="Arial">Date</font> </th> 
          <th> <font face="Arial">Time</font> </th>
      </thead>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["flightnumber"];
        $field2name = $row["seatavl"];
        $field3name = $row["date"];
        $field4name = $row["time"];
	
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  
              </tr>';
    }
	 echo '</table>';
} else {
	echo "No Flights";
}
?>