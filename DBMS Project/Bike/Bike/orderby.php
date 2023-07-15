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
		background-image: url('ssss.jpg');
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
<title>Order by</title>
<br><br><br><br><br><b>Enter the required details:</b><br><br>
<form  method="POST" action=#>
  <label for="Order by">Order by</label>
  <select name="y">
	<option value="Price">Price</option>
	<option value="year_of_release">year_of_release</option>
	</select>
  <br>
  
  <input type="Submit">
</form>
</body> 
</html>
<br>
<?php 

$host="localhost:3306";
$user="root";
$password="";
$db="bike_showroom";

$conn= mysqli_connect($host,$user,$password,$db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['y']) ){
	$ob=$_POST['y']; 
	$sql2="SELECT  bike.version_name ,bike.".$ob."
	FROM bike_showroom.bike 
    ORDER BY ".$ob.";";
	$data=$conn->query($sql2);
	echo '<table width=70% border="1" cellpadding="5">
		<tr>
			<th>Version Name</th>
			<th>'.$ob.'</th>
		</tr>';
	foreach($data as $row)
	{
		echo '<tr>	
					<td>'.$row["version_name"].'</td>		
					<td>'.$row[$ob].'</td>
			  </tr>';
	}
	//echo <tabel>;
}
$conn->close();
  
?>
