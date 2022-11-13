<html>
<head>
<style>
body{
	background-image: url(flightlight.jpg);
	background-size: cover;
}
h1 {
text-align:center;
}
.login{
	position: absolute;
	top: calc(30% - 10px);
	left: calc(42% - 35px );
	height: 700px;
	width: 50%;
	padding: 10px;
	z-index: 2;
}
.login input[type=text],input[type=date],input[type=time],input[type=number]{
	width: 250px;
	height: 25px;
	background: white;
	border: 1px solid black;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 5px;
}
.login input[type=submit]{
	width: 250px;
	height: 45px;
	background: black;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
label {
	font-family: 'Exo', sans-serif;
	font-size: 24px;
	color:black;
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
    color:#000080;
}
</style> 
</head>
<body>
<ul>
 	<li><a class="active" href="admin.php">Home</a></li>
	<li style="float:left"><a class="active" href="view.php">View Flights</a></li>
	<li style="float:left"><a class="active" href="viewbookings.php">View Bookings</a></li>
	<li style="float:left"><a href="#add">Add</a></li>
	<li style="float:left"><a class="active" href="delete.php">Delete</a></li>
	<li style="float:left"><a class="active" href="logout.php">Logout</a></li>
</ul>
	<h1>Enter flight details</h1><br>
	<form  method="post">
		<div class="login">
			<label>Flight Number:</label><br />
			<input type="text" name="flightnumber" required/><br /><br>
			<label>Seat Availability:</label><br/>
			<input type="number" name="seatavl" value="60"/> <br/><br>
			<label>Date:</label><br />
			<input id="datepicker" type="date" name="date" required/><br><br/>
			<label>Departure Time:</label><br/>
			<input type="time" name="time" required/><br/> <br>
			<input type="submit" name="OK" value="Add Flight"/>
		</div>
	</form>
</body>
</html>
<?php  
$con=mysqli_connect("localhost","root","","yamini");
if(isset($_POST['OK'])){
$p =$_POST['flightnumber'];
$f =$_POST['seatavl'];  
$k=$_POST['date'];
$g=$_POST['time']; 
$sql=mysqli_query($con,"INSERT INTO flight (flightnumber, seatavl, date, time) VALUES ('$p', '$f', '$k', '$g')") ;
header("location: view.php");
	exit;
}
?> 