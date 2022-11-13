<html>
<head>
<style>
h1 {
	text-align:center;
	line-height: 250px;
}
body {
	background-image: url(flightwing.jpg);
	background-size: cover;
}
.login{
	position: absolute;
	top: calc(30% - 10px);
	left: calc(42% - 35px );
	height: 700px;
	width: 50%;
	padding: 10px;s
}
.login input[type=text],input[type=password]{
	width: 300px;
	height: 50px;
	background: white;
	border: 1px solid black;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}
.login input[type=submit]{
	width: 300px;
	height: 45px;
	background: black;
	border: 1px solid black;
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
</style> 
</head>
<body>

<h1>Enter your details</h1>
<form method="post">
	<div class="login">
		<label>Userid:</label><br />
		<input type="text" name="userid" required/><br /><br>
		<label>Password:</label><br/>
		<input type="password" name="password" required/><br/><br>
		<input type="submit" name="OK" />
	</div>
</form>
</body>
</html>
<?php  
$con=mysqli_connect("localhost","root","","yamini");
if(isset($_POST['OK'])){
$p =$_POST['userid'];
$f =$_POST['password'];  

$sql=mysqli_query($con,"INSERT INTO user (userid, password) VALUES ('$p', '$f')") ;
unset($p);
header("location: index.html");
	exit;
}
?>