<?php	
	$con=mysqli_connect("localhost","root","","bs") or die("Database Connection Error");
	session_start();
	$flag=0;
	$sql="SELECT * FROM users";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	$email=$_POST["username"];
	$password=$_POST["password"];
	while($row=mysqli_fetch_array($res))
	{
		if($row["email"]==$email  && $row["password"]==$password)
		{
			$_SESSION["user"]=$row["email"];
			$_SESSION["name"]=$row["name"];
			$flag=1;
		}
	}
	if($flag==1)
		echo "Logged In";
	else
		echo "Wrong Email or Password";
?>