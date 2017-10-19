<?php	
	$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
	session_start();
	$email=$_POST["email"];
	$name=$_POST["firstname"]." ".$_POST["lastname"];
	$password=$_POST["password"];
	$sql="INSERT INTO users VALUES(0,'$name','$email','$password','$cart')";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	header("Location:index.php");
?>