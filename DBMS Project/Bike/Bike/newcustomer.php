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
<html lang="en">
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
	margin:0;
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
<head>
<br>
    <title>New Customer</title>
<br><br><br><br><br><b>Enter the required details:</b><br><br>
<div class="container"> 
<form  method="POST" action=# >
	
	<div class="form-input">
		<b>FIRST NAME:</b>
		<input type="text" name="fn" placeholder="FIRST NAME" style="background-color: half white" size="15" pattern="[A-Za-z]+$">
	</div>
	<div class="form-input">
		<b>LAST NAME:</b>
		<input type="text" name="ln"  placeholder="LAST NAME" style="background-color: half white" size="15" pattern="[A-Za-z]+$">
	</div>
	<div class="form-input">
		<b>PHONE NUMBER:</b>
		<input type="INT" name="pn"  placeholder="PHONE NUMBER" style="background-color: half white" size="10" pattern="^[0-9]{10}">
	</div>
	<div class="form-input">
		<b>BIKE ID:</b>
		<input type="INT" name="bid" placeholder="BIKE ID" style="background-color: half white"  size="15">
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

if (isset($_POST['bid'])) {
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$pn = $_POST['pn'];
	$bid = $_POST['bid'];

	$sql4 = "SELECT * FROM bike WHERE bike_id = '" . $bid . "' ";
	$result4 = $conn->query($sql4);

	if (mysqli_num_rows($result4) == 1) {

		$sql3 = "SELECT * FROM customer WHERE bike_id = '" . $bid . "' ";
		$result3 = $conn->query($sql3);

			if (mysqli_num_rows($result3) == 1) {
				echo 'Bike is already registered';
			} else {
				$sq1 = "INSERT INTO customer (fname,lname,cust_phone,bike_id) VALUES ('" . $fn . "','" . $ln . "','" . $pn . "','" . $bid . "')";
				$result1 = $conn->query($sq1);
				if ($result1 === TRUE) {
					echo "\n Customer record added successfully";
				} else { //echo "\nError: \n" . $sq1 . "<br>" . $conn->error;
					echo "Please fill all the details ";
				}
			}
	}
	else { 
		echo "Bike does not exist ";
	}
}

$conn->close();
?>