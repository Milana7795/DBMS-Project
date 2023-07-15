<?php
include 'config1.php';// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if($_SESSION["loggedin"] != true){
    header("location: login.php");
    exit;
}
?>
<!Doctype Html>
<html>
<body style="color:#404040;font-size:20px;">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style> 
body{ font: 18px sans-serif; text-align: left; }
		body {
		background-image: url('sss.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: cover;
}
.container{
    width: 100%;
	margin: 0;
}
.header img {
  float: left;
  width: 100px;
  height: 50px;
  background: #000;
}
.carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">

    <a class="navbar-brand" href="#"></a>
	<div class="header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="retrieve.php">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
<body style="color:#404040;font-size:20px;">
<br>
<title>New Bike</title>
<br><br><b>Enter the available details of the model:</b><br><br>
<div class="container">
<form  method="POST" action=# >
	
	<div class="form-input">
		<b>VIN:</b>
		<input type="VARCHAR" name="vin"  placeholder="VIN" style="background-color: #cccccc" size="40">
	</div>
	<div class="form-input">
		<b>ENGINE NUMBER:</b>
		<input type="VARCHAR" name="eng"  placeholder="ENGINE NUMBER" style="background-color: #cccccc" size="40">
	</div>
	<div class="form-input">
		<b>VERSION NAME:</b>
		<input type="VARCHAR" name="ver" placeholder="VERSION NAME" style="background-color: #cccccc"  size="40">
	</div>
	<div class="form-input">
		<b>YEAR OF RELEASE:</b>
		<input type="int" name="yor" placeholder="YEAR OF RELEASE" style="background-color: #cccccc"  size="40">
	</div>
	<div class="form-input">
		<b>PRICE:</b>
		<input type="DECIMAL" name="p"  placeholder="PRICE" style="background-color: #cccccc" size="40">
	</div>
  <input type="submit"  value="SUBMIT" class="btn-btn-primary"/>
</form>
</body> 
</html>

<?php 

$host="localhost:3306";
$user="root";
$password="";
$db="bike_showroom";
$conn= mysqli_connect($host,$user,$password,$db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['vin']) && !empty($_POST['eng']) && !empty($_POST['p']) && !empty($_POST['ver'])) {
	$vin = $_POST['vin'];
	$eng = $_POST['eng'];
	$ver = $_POST['ver'];
	$yor = $_POST['yor'];
	$p = $_POST['p'];

		$sql1 = "INSERT INTO bike (vin,engine_no,year_of_release,version_name,price) VALUES ('" . $vin . "','" . $eng . "','" . $yor . "','" . $ver . "' ,'" . $p . "')";

		$query = mysqli_query($conn, $sql1);
		if ($query) {
			echo "Data inserted successfully";
		}
		else {
			echo "Please verify your connection";
		}
	}
else{
	echo "Please fill the details";
}
$conn->close();
?>