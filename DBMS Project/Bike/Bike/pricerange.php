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
<head>
<title>Price Range</title> 
</head>
<body style="color:#404040;font-size:20px;">
<br><br><br><br><br><b>Select the appropriate range of price from the drop down list:</b><br><br>
<form  method="POST" action=# >
<label for="Price">Price range:</label>
  <select id="list" name="list">
	<option value= "0 and 60000 " > less than 60000 </option>
    <option value="60001 and 100000" >60000-100000</option>
    <option value="100001 and 500000">100000-500000</option>
	<option value="500001 and 1000000">500000-1000000</option>
	<option value="1000001 and 1500000">1000000-1500000</option>
	<option value="1500001 and 2000000">1500000-2000000</option>
	<option value= "2000001 and 6000000" > greater than 2000000 </option>
  </select>
  <br>
  <input type="Submit">
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
if(isset($_POST['list']) ){
	$gb1=$_POST['list']; 
	
	$sql2 = "SELECT bike.version_name,bike.price
	FROM bike_showroom.bike
	HAVING  bike.price BETWEEN ".$gb1."
	order by price  ;";
		
	$data=$conn->query($sql2);
	echo '<table width=70% border="1" cellpadding="5" >
		<tr>
			<th>Version name </th>
			<th>Price</th>
		</tr>';
	foreach($data as $row)
	{
		echo '<tr>	
					<td>'.$row["version_name"].'</td>
					<td>'.$row["price"].'</td>
																
			  </tr>';
	}
}
$conn->close();
?>