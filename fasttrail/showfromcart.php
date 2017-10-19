<?php
			session_start();
			$total=0;
			$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
			$user=$_SESSION['user'];
			$sql="SELECT cart FROM users WHERE email='$user'";
			$res=mysqli_query($con, $sql) or die("Database query Error");
			$cart=mysqli_fetch_array($res)[0];
			$cartarr=explode(",", $cart);
			foreach ($cartarr as $item) 
			{
				if ($item=="")
					continue;
				$sql="SELECT * FROM data WHERE dress_id=$item";
				$res=mysqli_query($con, $sql) or die("Database query Error");
				while ($row=mysqli_fetch_array($res)) 
				{
					$brnd=$row['brand'];
					$type=$row['type'];
					$price=$row['price'];
					echo "<div id='$item'>$brnd $type - &#8377;$price";
					echo "<a class='w3-right w3-btn w3-hover-red' onclick='remove($item);'> Remove</a><br><br></div>";
					$total+=$price;
				}
			}
			echo "<center><div id='total' class='w3-xlarge'> Total : &#8377;$total</div></center>";
?>