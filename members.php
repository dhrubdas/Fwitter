<?php 

//Connects to your Database 
 mysql_connect("fwitterusers.db.11414190.hostedresource.com", "fwitterusers", "Fwit@123") or die(mysql_error()); 
 mysql_select_db("fwitterusers") or die(mysql_error());

 
 //checks cookies to make sure they are logged in 

 if(isset($_COOKIE['ID_my_site'])) 

 { 

 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site']; 

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )) 	 

 		{ 

 

 //if the cookie has the wrong password, they are taken to the login page 

 		if ($pass != $info['password']) 

 			{ 			header("Location: login.php"); 

 			} 

 

 //otherwise they are shown the admin area	 

 	else 

 			{ 

 			 echo ""; 

 echo ""; 

 echo ""; 

 			} 

 		} 

 		} 

 else 

 

 //if the cookie does not exist, they are taken to the login screen 

 {			 

 header("Location: login.php"); 

 } 

 ?> 
 
<?php 
$user = $_GET["userid"];

if ($user = $username) 
{ 
?>

<html>
<head>
</head>
 <body>
 <div style="width: 80%; height: 100%; margin-left: auto; margin-right:auto;">
 <div style="position:absolute; padding: 15px; border: #000, solid, 2px; float: left; left: 20px;">
 <h1> Welcome <?php echo "$username" ?></h1>
 
 </div>
 
 </div>
 
 


</body>
</html>

<?php }
else
{
	?>
    
<html>
<head>
</head>
 <body>
 <div style="width: 80%; height: 100%; margin-left: auto; margin-right:auto;">
 <div style="position:absolute; padding: 15px; border: #000, solid, 2px; float: left; left: 20px;">
 <h1><?php echo "$user" ?>'s Profile</h1>
 <p> status </p>
 <p> Follow <?php echo "$user" ?> </p>
 </div>
 
 </div>
 
 


</body>
</html>

    <?php
}
?>

