<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="image">
	<input type="submit" name="submit">
</form>
</body>
</html>

<?php
session_start();
$con=mysqli_connect('localhost','root','','fasttry');
$id=$_GET['id'];
$sql="SELECT image from data WHERE dress_id=$id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res)[0];
copy("C:/xampp/htdocs/fasttry/data/$row", "C:/xampp/htdocs/fasttry/useruploads/dress.png") or die("Copy Error");
$target_dir = "useruploads/img/";
$target_file = $target_dir ."img.jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) 
    {
        echo "File is an image - " . $check["mime"] . ".";
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
        	echo "Uploaded";
        	$_SESSION['uploaded']=1;
        	echo "<script>window.close();</script>";
    	} 
    	else 
    	{
        	echo "Sorry, there was an error uploading your file.";
    	}
    	$uploadOk = 1;
    } 
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>