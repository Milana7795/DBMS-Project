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
<title>New Booking</title>
<br><br><b>Enter the details:</b><br><br>
<div class="container">
<form  method="POST" action=# >

	<div class="form-input">
		<b>BIKE ID:</b>
		<input type="INT" name="bid"  placeholder="BIKE ID" style="background-color: #cccccc" size="40">
	</div>
	<div class="form-input">
		<b>CUSTOMER ID:</b>
		<input type="INT" name="cid"  placeholder="CUSTOMER ID" style="background-color: #cccccc" size="40">
	</div>
	<div class="form-input">
		<b>DATE:</b>
		<input type="DATE" name="dt" placeholder="VERSION NAME" style="background-color: #cccccc"  size="40">
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

if (!empty($_POST['bid']) && !empty($_POST['cid']) && !empty($_POST['dt'])) {
  $bid = $_POST['bid'];
  $cid = $_POST['cid'];
  $dt = $_POST['dt'];

  $sql4 = "SELECT * FROM booking WHERE bike_id = '" . $bid . "' and cust_id = '" . $cid . "' ";
	$result4 = $conn->query($sql4);

	if (mysqli_num_rows($result4) == 1) {
		echo "Booking ID exist, Booking already done";
	} else {
    $sql2 = "SELECT * FROM customer WHERE cust_id = '" . $cid . "' and bike_id = '" . $bid . "' ";
    $result2 = $conn->query($sql2);

    if (mysqli_num_rows($result2) == 1) {
      $sql1 = "INSERT INTO booking (bike_id,cust_id,bdate) VALUES ('" . $bid . "','" . $cid . "','" . $dt . "')";
      $query = mysqli_query($conn, $sql1);
      if ($query) {
        echo "booking is added successfully";
      } else {
        echo "Please verify your connection";
      }
    } else {
      echo "\n Please fill the correct details";
    }
  }
}
else{
	echo "Please fill the details";
}
$conn->close();
?>
