<html>
<head>
<style>
body{
	background-image: url(flightlight.jpg);
	background-size: cover;
}
thead {
	font: bold;
	border: 1px solid black;
}
.table {
	position: absolute;
	border: 1px solid black;
	text-align: center;
}
th,tr,td {
	border:1px solid black;
}
td input[type=submit]{
	background-color:#000080;
	color:white;
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
    color:#000080
}
}
</style>
</head>
<body>
<ul>
 	<li><a class="active" href="user.php">Home</a></li>
	<li style="float:left"><a href="booknow.php">Book Flight</a></li>
	<li style="float:left"><a class="active" href="mybookings.php">My Bookings</a></li>
	<li style="float:left"><a class="active" href="logout.php">Logout</a></li>
</ul>
</body>
</html>
<?php 
$user = "root"; 
$pass = ""; 
$dbname = "yamini"; 
$mysqli = new mysqli("localhost", $user, $pass, $dbname); 
$query = "SELECT * FROM flight WHERE seatavl > 0";
$result = $mysqli->query($query);
echo '
<table class="table" border="0" cellspacing="2" cellpadding="2"> 
      <thead> 
          <th> <font face="Arial">Flight Number</font> </th> 
          <th> <font face="Arial">Seat Availability</font> </th> 
          <th> <font face="Arial">Date</font> </th> 
          <th> <font face="Arial">Time</font> </th>
	    <th> <font face="Arial">Book Now</font> </th>
      </thead>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["flightnumber"];
        $field2name = $row["seatavl"];
        $field3name = $row["date"];
        $field4name = $row["time"];

        echo '<form method="POST" action="booking.php">
		<tr> 
                  <td><input type="text" name="flightnumber" value='.$field1name.'></td> 
                  <td><input name="seatavl" value='.$field2name.'></td> 
                  <td><input name="date" value='.$field3name.'></td> 
                  <td><input name="time" value='.$field4name.'></td> 
                <td><input type="submit" value="Book" name="booknow" ></input></td>  
              </tr></form> ';
    }
echo '</table>';
    $result->free();
}
?>