<?php
include 'config1.php';// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if($_SESSION["loggedin"] != true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
body {
  background-image: url('sss.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size:cover;
}
h2 {
  font-size: 32px;
}

p {
  font-size: 27px;
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
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <br><br><br><h1 class="my-5">Hi <b><?php echo htmlspecialchars($_SESSION["username"]); ?>,</b></br> 
<b></b>Welcome</h1>
<div class="row">
  <div class="column">&emsp;&emsp;
    <img src="icon 5.png" alt="New bike model" style="width:30%">
  </div>
  <div class="column">&emsp;&emsp;
     <img src="icon 5.png" alt="New customer record"style="width:30%">
  </div>
  <div class="column">&emsp;&emsp;
    <img src="booklogo.png" alt="Booking" style="width:25%">
  </div>
  <div class="column">&emsp;&emsp;
    <img src="paylogo.png" alt="Payment" style="width:15%">
  </div>
</div>
    <p>
       
      <a href="newbike.php" class="btn btn-primary">New bike model</a>
      &emsp; &emsp; &emsp;
      <a href="newcustomer.php" class="btn btn-primary">New customer record</a>
      &emsp; &emsp; &emsp;
		  <a href="booking.php" class="btn btn-primary">Booking</a>
      &emsp; &emsp; &emsp; &emsp;
      <a href="payment.php" class="btn btn-primary">Payment</a>

    </p>

</body>
</html>
