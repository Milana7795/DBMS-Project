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
    <title>Retrieve</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 18px sans-serif; text-align: left; }
		body {
		background-image: url('sss.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: cover;
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
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


	<h2>Select from the available features</h2>
	<br>
<div class="row">
	&emsp;&emsp;
	<div class="column">
		<img src="icon 5.png" alt="group by"style="width:40%">
	</div>
	<div class="column">
		<img src="icon 5.png" alt="order by" style="width:40%">
	</div>
	<div class="column">
		<img src="icon 5.png" alt="price range" style="width:40%">
	</div>
	<div class="column">
		<img src="icon 5.png" alt="Compare bikes" style="width:40%">
	</div>
</div>

    <p>
		&emsp;
		<a href="groupby.php" class="btn btn-primary">Group by</a>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <a href="orderby.php" class="btn btn-primary">Orderby</a>
		&emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="pricerange.php" class="btn btn-primary">Range of price</a>
		&emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="cbikes.php" class="btn btn-primary">Compare bikes</a>
    </p>
	<br><br>
<div class="row">
	&emsp;&emsp;
	<div class="column">
		<img src="icon 5.png" alt="group by"style="width:40%">
	</div>
	<div class="column">
		<img src="icon 5.png" alt="price range" style="width:40%">
	</div>
  <div class="column">
		<img src="icon 5.png" alt="Compare bikes" style="width:40%">
	</div>
</div>
    <p>
		&emsp;
		<a href="customerd.php" class="btn btn-primary">Customer details</a>
		&emsp;&emsp;&emsp;&emsp;
		<a href="delete.php" class="btn btn-primary">Delete a model</a>
    &emsp;&emsp;&emsp;&emsp;
		<a href="update.php" class="btn btn-primary">Update price</a>
    </p>
    
</body>
</html>