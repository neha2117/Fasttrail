<?php
	session_start();
	$total=0;
	$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
	$id=$_GET['id'];
	$user=$_SESSION['user'];
	$sql="SELECT cart FROM users WHERE email='$user'";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	$precart=mysqli_fetch_array($res)[0];
	$precart=explode(",", $precart);
	if (($key = array_search($id, $precart)) !== false)
	{
    	unset($precart[$key]);
	}
	$cart=implode(",", $precart);
	$sql="UPDATE users SET cart='$cart' WHERE email='$user'";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	$sql="SELECT cart FROM users WHERE email='$user'";
	$res=mysqli_query($con, $sql) or die("Database query Error");
	$cartarr=explode(",", $cart);
	foreach ($cartarr as $item) 
	{
		if ($item=="")
			continue;
		$sql="SELECT price FROM data WHERE dress_id=$item";
		$res=mysqli_query($con, $sql) or die("Database query Error");
		while ($row=mysqli_fetch_array($res)) 
		{
			$price=$row['price'];
			$total+=$price;
		}
	}
	echo "<center><div id='total' class='w3-xlarge'> Total : &#8377;$total</div></center>";
?>