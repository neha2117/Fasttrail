<!DOCTYPE html>
<html>
<head>
	<title>Fast Trial - Men Fashion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">

	<link rel="stylesheet" href="bootstrap/w3.css">
</head>
<body style="padding-top:43px;" onload="cnt();">
	<?php
		$con=mysqli_connect("localhost","root","","fasttry") or die("Database Connection Error");
	?>
	<!-- Navigation Bar -->
	<ul class="w3-navbar w3-collapse w3-black w3-large w3-top">
		
		<li class="w3-hide-medium w3-hide-large w3-black w3-opennav w3-left">
	    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
	  </li>
		
		<?php 
			session_start();
			if(!isset($_SESSION["user"]))
			{
 		?>
 			<li class='w3-hide-small w3-xlarge w3-margin-left'>FastTrial.com</li>
			<li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="document.getElementById('signup').style.display='block'"><i class='glyphicon glyphicon-lock'></i> Create an Account</a></li>
			<li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="document.getElementById('login').style.display='block'"><i class='glyphicon glyphicon-user'></i> Login</a></li>
		<?php
				}
				else
				{
					$name=$_SESSION['name'];
		?>
				<li class='w3-hide-small w3-xlarge w3-margin-left'>Welcome, <?php echo "$name"; ?></li>
				<li class="w3-hide-small"></li>
				<li class='w3-right w3-hide-small'><a href='logout.php' class='w3-hover-yellow'><i class='glyphicon glyphicon-user'></i> Logout</a></li>
				<li class='w3-right w3-hide-small'><a class='w3-hover-yellow' onclick="cart()"><i class='glyphicon glyphicon-shopping-cart'></i> Cart</a></li>
		<?php
				}
		?>
		<li class='w3-right'><a href="women.php" class="w3-hover-yellow w3-hide-small">Women</a></li>
		<li class='w3-right'><a href="men.php" class="w3-hover-yellow w3-hide-small">Men</a></li>
		<li class='w3-right'><a href="index.php" class="w3-hover-yellow">Home</a></li>
	</ul>

<!--Navbar for small scren -->

<div id="demo" class="w3-hide w3-hide-large w3-hide-medium">
  <ul class="w3-navbar w3-left-align w3-large w3-black">
  <center>
    <li><a href="men.php">Men</a></li>
    <li><a href="women.php">Women</a></li>
    <?php 
			if(!isset($_SESSION["user"]))
			{
 		?>
			<li><a class='w3-hover-yellow' onclick="document.getElementById('signup').style.display='block'"><i class='glyphicon glyphicon-lock'></i> Create an Account</a></li>
			<li><a class='w3-hover-yellow' onclick="document.getElementById('login').style.display='block'"><i class='glyphicon glyphicon-user'></i> Login</a></li>
		<?php
				}
				else
				{
		?>
				<li><a href='logout.php' class='w3-hover-yellow'><i class='glyphicon glyphicon-user'></i> Logout</a></li>
				<li><a class='w3-hover-yellow' onclick="cart()"><i class='glyphicon glyphicon-shopping-cart'></i> Cart</a></li>
		<?php
				}
		?>
	</center>
  </ul>
</div>

	<!-- Side Bar -->

	<nav class="w3-sidenav w3-collapse w3-white w3-card-2 w3-animate-left" style="width:200px;" id="sidenav">
		<a href="javascript:void(0)" onclick="w3_close()"
		class="w3-closenav w3-large w3-hide-large">Close &times;</a>
	<center><button class="w3-btn w3-round  w3-margin-top w3-padding w3-container" onclick="cnt();">Reset Filter</button></center>
	<h3 class="w3-margin">Choose type</h3>
	<?php
		$sql="SELECT DISTINCT type FROM data WHERE gender='Men'";
		$res=mysqli_query($con, $sql) or die("Database query Error");
		while($row=mysqli_fetch_array($res))
		{
			$type=$row['type'];
			$typ="'".$row['type']."'";
			$what="'"."type"."'";
	?>
			<a href='#' class='w3-hover-yellow' onclick="filter(<?php echo $what; ?>,<?php echo $typ; ?>);"><?php echo $type; ?></a><br>
	<?php
		}
		
	?>
	<h3 class="w3-margin">Choose brand</h3>
	<?php
		$sql="SELECT DISTINCT brand FROM data WHERE gender='Men'";
		$res=mysqli_query($con, $sql) or die("Database query Error");
		while($row=mysqli_fetch_array($res))
		{
			$brand=$row['brand'];
			$type="'".$row['brand']."'";
			$what="'"."brand"."'";
	?>
			<a href='#' class='w3-hover-yellow' onclick="filter(<?php echo $what; ?>,<?php echo $type; ?>);"><?php echo $brand; ?></a><br>
	<?php
		}
		
	?>
	<h3 class="w3-margin">Choose color</h3>
	<?php
		$sql="SELECT DISTINCT color FROM data WHERE gender='Men'";
		$res=mysqli_query($con, $sql) or die("Database query Error");
		while($row=mysqli_fetch_array($res))
		{
			$color=$row['color'];
			$type="'".$row['color']."'";
			$what="'"."color"."'";
	?>
			<a href='#' class='w3-hover-yellow' onclick="filter(<?php echo $what; ?>,<?php echo $type; ?>);"><?php echo $color; ?></a><br>
	<?php
		}
		
	?>
	</nav>

	<div class="w3-main" style="margin-left:200px;">
		<header class="w3-container w3-khaki">
	  		<span class="w3-opennav w3-large w3-hide-large" onclick="w3_open()">Filter</span>
	  		<center><h2>Men</h2></center>
		</header>

		<!-- Container -->
	

		<div class='w3-row-padding' id="cntdata">
		
		</div>

		<!-- Footer -->

		<footer class="w3-container w3-khaki w3-margin-top">
		  <center>
		  <h5>Fast Trial</h5>
		  <p>Try the latest fashion live!</p>
		 	</center>
		</footer>
	     
	</div>

	<!-- Login Modal -->

	<div id="login" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:400px">
		    <header class="w3-container w3-yellow">
			  	<h1>Login</h1>
			    <div class="w3-center"><br>
			    	<span onclick="document.getElementById('login').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
			    </div>
			</header>

		    
			    <div class="w3-section w3-container">
			        <label><b>Email</b></label>
			        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" id="username" required>
			        <label><b>Password</b></label>
			        <input class="w3-input w3-border" type="password" placeholder="Enter Password" id="password" required>
			        <div id="loginpass"></div>
			        <button class="w3-btn-block w3-green w3-section w3-padding" name="login" onclick="logincheck();">Login</button>
			    </div>
		  

		</div>
	</div>

	<!-- Signup Modal -->

	<div id="signup" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">
		  	<header class="w3-container w3-yellow">
			  	<h1>Sign Up</h1>
			    <div class="w3-center"><br>
			    <span onclick="document.getElementById('signup').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
			    </div>
			</header>
		    <form class="w3-container" action="signup.php" method="post">
			    <div class="w3-section">
			        <label><b>First Name</b></label>
			        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter First Name" name="firstname" required>

			        <label><b>Last Name</b></label>
			        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Last Name" name="lastname" required>

			        <label><b>Email</b></label>
			        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="email" required>

			        <label><b>Password</b></label>
			        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>

			        <button class="w3-btn-block w3-green w3-section w3-padding" name="signup" type="submit">Create Account</button>
			    </div>
		    </form>

		</div>
	</div>

	<!-- Cart Modal -->

	<div id="cart" class="w3-modal">
		<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:500px">
		    <header class="w3-container w3-yellow w3-margin-bottom">
			  	<h1>Cart</h1>
			    <div class="w3-center"><br>
			    	<span onclick="document.getElementById('cart').style.display='none'" class="w3-closebtn w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
			    </div>
				</header>
			<div id="cartx" class="w3-container w3-large"></div>
			<center><button class="w3-btn w3-xlarge w3-green w3-margin w3-round">Check Out</button></center>
		</div>
	</div>

	<script>
	function myFunction() 
	{
	    var x = document.getElementById("demo");
	    if (x.className.indexOf("w3-show") == -1) 
	    {
	        x.className += " w3-show";
	    } 
	    else 
	    {
	        x.className = x.className.replace(" w3-show", "");
    	}
	}
	function w3_open() 
	{
	    document.getElementById("sidenav").style.display = "block";
	}
	function w3_close() 
	{
	    document.getElementById("sidenav").style.display = "none";
	}
	function func(id,log) 
	{
		if(!log)
		{
			document.getElementById('login').style.display='block';
		}
		else
		{
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() 
	    {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	      {
	        document.getElementById("add"+id).innerHTML = "Done <i class='glyphicon glyphicon-ok'></i>";
	        document.getElementById("add"+id).className = document.getElementById("add"+id).className.replace("w3-black", "w3-green");
	        document.getElementById("add"+id).className = document.getElementById("add"+id).className.replace("w3-hover-red", "w3-hover-green");

	      }
	    };
	    setTimeout(function(){
	    	document.getElementById("add"+id).innerHTML="Add to cart <i class='glyphicon glyphicon-shopping-cart'></i>";
	    	document.getElementById("add"+id).className = document.getElementById("add"+id).className.replace("w3-green", "w3-black");
	    	document.getElementById("add"+id).className = document.getElementById("add"+id).className.replace("w3-hover-green", "w3-hover-red");
	    },1500);
	    xmlhttp.open("GET", "addtocart.php?id="+id, true);
	    xmlhttp.send();
	  }
  }
  function cart(crt) 
  {
  	document.getElementById('cart').style.display='block';
		xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
      {
        document.getElementById("cartx").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","showfromcart.php",true);
    xmlhttp.send();
	}
	function remove(itemid) 
  	{
		xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
      {
        document.getElementById(""+itemid).innerHTML = "";
        document.getElementById("total").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","removefromcart.php?id="+itemid,true);
    xmlhttp.send();
	}
	function cnt() 
 	{
		xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function()
	    {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	      {
	        document.getElementById("cntdata").innerHTML = xmlhttp.responseText;
	      }
	    };
	    xmlhttp.open("GET","cntdata.php?g="+"Men",true);
	    xmlhttp.send();
	}
	function logincheck()
	{
		//alert();
		var name=document.getElementById('username').value;
		var pass=document.getElementById('password').value;
		xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function()
	    {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	      {
	        if(xmlhttp.responseText=="Wrong Email or Password")
	        {	
	        	document.getElementById("loginpass").style="color:red;";
	        	document.getElementById("loginpass").innerHTML = xmlhttp.responseText;
	      	}
	      	else
	      		window.location="men.php";
	      }
	    };
	    xmlhttp.open("POST","login.php",true);
	    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xmlhttp.send("username="+name+"&password="+pass);
	}
	function filter(type,value)
	{
		xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function()
	    {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	      {
	        document.getElementById("cntdata").innerHTML = xmlhttp.responseText;
	      }
	    };
	    xmlhttp.open("GET","cntdata.php?g=Men&type="+type+"&value="+value,true);
	    xmlhttp.send();
	}
	</script>

</body>
</html>