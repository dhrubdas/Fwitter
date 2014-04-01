<?php

if (empty($_COOKIE['ID_my_site']))
{
header ("Location: http://dhrub.co/fwitter/login.php");
}

?>
<?php
 mysql_connect("fwitterusers.db.11414190.hostedresource.com", "fwitterusers", "Fwit@123") or die(mysql_error()); 
 mysql_select_db("fwitterusers") or die(mysql_error());
 
 $userid = $_GET['userid'];
 $username = $_COOKIE['ID_my_site'];
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo "$userid" ?> - Fwitter</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><a href="home.php"><img src="img/logo.jpg" height="100%" /></a><span style="float:right; color:#fff; top:15px; right:10px; position:absolute;"><a href="logout.php"><b>Logout</b></a></span></div>
<div class="box" style="top: 20% !important;" align="left">

<h2>@<?php echo "$userid" ?>'s Profile </h2>
<?php
$result = mysql_query("SELECT * FROM users WHERE username = '$userid'") 
or die(mysql_error());  
?>
<p><b>Most recent tweet:</b> "<?php while($row = mysql_fetch_array( $result )) {
	echo $row['Status'];
}
	 ?>"</p>
<p>
  <?php
if($userid == $username) {
echo '<h3> Friends List </h3>';
$result = mysql_query("SELECT * FROM friends WHERE user1='$username'");
while($row = mysql_fetch_array($result)) {
	$friend = $row['user2'];
	$result1 = mysql_query("SELECT * FROM users WHERE username =      '$friend'");
	while($row1 = mysql_fetch_array($result1)) {
echo $row1['Firstname'] . " " . $row1['Lastname'] . ', <a href="profile.php?userid=' . $row1['username'] . '">@' . $row1['username'] . '</a>';
	  echo "<p> </p>";
	  echo "<br>";
	}
}

} 
else {
$result3 = mysql_query("SELECT * FROM friends WHERE user1='$username' AND  user2='$userid'");
 
if(mysql_num_rows($result3) > 0)
{
echo "You are following " . $userid . "'s tweets";
}
else
{
	echo '<a href="follow.php?userid=' . $row['username'] . '">Follow </a>' . $userid . "'s tweets";
}
}
?>
<p>&nbsp; </p>
<a href="home.php"> <-- Back </a>
</div>
</body>
</html>