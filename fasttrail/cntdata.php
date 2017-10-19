<?php
			session_start();
			$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
			$g=$_GET['g'];
			$sql="SELECT * FROM data WHERE gender='$g'";
			if (isset($_GET['type'])) 
			{
				$t=$_GET['type'];
				$v=$_GET['value'];
				$sql.=" AND $t = '$v'";
			}
			$res=mysqli_query($con, $sql) or die("Database query Error");
			while($row=mysqli_fetch_array($res))
			{
				if(isset($_SESSION['user']))
					$logged="true";
				else
					$logged="false";
				$img=$row['image'];
				$price=$row['price'];
				$brand=$row['brand'];
				$type=$row['type'];
				$id=$row['dress_id'];
				echo "<div class='w3-third'>";
				echo "<div class='w3-card-4 w3-margin-top'>";
				echo "<a href='choice.php?id=$id'><img src='data/$img' style='width:100%;max-height:300px;'></a>";
				echo "<div class='w3-container w3-pale-blue '>";
				echo "<center><h3>$brand $type <br> &#8377;$price</h3></center>";
				echo "<center><button id='add$id' class='w3-btn w3-black w3-round-xlarge w3-margin-top w3-margin-bottom w3-hover-red' onclick='func($id,$logged);'>Add to cart <i class='glyphicon glyphicon-shopping-cart'></i></button></center>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
?>