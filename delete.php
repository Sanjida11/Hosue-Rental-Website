<?php
require_once "config.php";
$con=mysqli_connect("localhost","root","","house4rent");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }


if(isset($_GET['id'])){
	$id = $_GET['id'];
mysqli_query($con,"DELETE FROM comments WHERE id='$id'");
header("location: commentsystem.php");
}
mysqli_close($con);
?>