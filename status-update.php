<?php 
 
 $con=mysqli_connect("fwitterusers.db.11414190.hostedresource.com","fwitterusers","Fwit@123","fwitterusers");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
 $username = $_COOKIE['ID_my_site']; 
 $status = $_POST['status'];
 
 mysqli_query($con,"UPDATE users SET Status='$status'
WHERE username='$username'");

header("location: http://www.dhrub.co/fwitter/home.php");

mysqli_close($con);
 
 ?> 