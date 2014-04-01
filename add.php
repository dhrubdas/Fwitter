<?php 
 mysql_connect("fwitterusers.db.11414190.hostedresource.com", "fwitterusers", "Fwit@123") or die(mysql_error()); 
 mysql_select_db("fwitterusers") or die(mysql_error());

 if (isset($_POST['submit'])) { 

 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['firstname'] | !$_POST['lastname']) {

 		die('You did not complete all of the required fields');

 	}

 	if (!get_magic_quotes_gpc()) {

 		$_POST['username'] = addslashes($_POST['username']);

 	}

 $usercheck = $_POST['username'];

 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 

or die(mysql_error());

 $check2 = mysql_num_rows($check);

 if ($check2 != 0) {

 		die('Sorry, the username '.$_POST['username'].' is already in use.');

 				}

 	if ($_POST['pass'] != $_POST['pass2']) {

 		die('Your passwords did not match. ');

 	}

 	$_POST['pass'] = md5($_POST['pass']);

 	if (!get_magic_quotes_gpc()) {

 		$_POST['pass'] = addslashes($_POST['pass']);

 		$_POST['username'] = addslashes($_POST['username']);

 			}

 	$insert = "INSERT INTO users (username, password, Firstname, Lastname)

 			VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".$_POST['firstname']."', '".$_POST['lastname']."')";

 	$add_member = mysql_query($insert);

 	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registration - Fwitter</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><a href="index.php"><img src="img/logo.jpg" height="100%" /></a></div>
<div class="box" align="left">
 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now <a href="login.php">login</a>.</p>
 </div>
 </body>
 </html>

 <?php 
 } 

 else 
 {	
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registration - Fwitter</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><a href="index.php"><img src="img/logo.jpg" height="100%" /></a></div>
<div class="box" align="center">
<h2> Registration Form </h2>
<p>All fields are required.</p>
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

 <table border="0">

 <tr><td>Username:</td><td>

 <input type="text" name="username" maxlength="60">

 </td></tr>

 <tr><td>Password:</td><td>

 <input type="password" name="pass" maxlength="10">

 </td></tr>

 <tr><td>Confirm Password:</td><td>

 <input type="password" name="pass2" maxlength="10">

 </td></tr>
 <tr><td>First Name</td><td>

 <input type="text" name="firstname" maxlength="60">

 </td></tr>
  <tr><td>Last Name</td><td>

 <input type="text" name="lastname" maxlength="60">

 </td></tr>


 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table>

 </form>
 </div>
 </body>
</html>

 <?php

 }
 ?> 
