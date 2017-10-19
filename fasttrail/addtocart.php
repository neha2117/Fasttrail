<?php
	session_start();
	$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
	$id=$_GET['id'];
	$user=$_SESSION['user'];
	$sql="SELECT cart FROM users WHERE email='$user'";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	$precart=mysqli_fetch_array($res)[0];
	$cart=$precart."$id,";
	$sql="UPDATE users SET cart='$cart' WHERE email='$user'";
	$res=mysqli_query($con, $sql) or die("Database query Error");
?>