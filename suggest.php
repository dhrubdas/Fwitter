<?php

if (empty($_COOKIE['ID_my_site']))
{
header ("Location: http://dhrub.co/fwitter/login.php");
}

?>
<?php
 mysql_connect("fwitterusers.db.11414190.hostedresource.com", "fwitterusers", "Fwit@123") or die(mysql_error()); 
 mysql_select_db("fwitterusers") or die(mysql_error());
 
 $username = $_COOKIE['ID_my_site']; 
 $user1 = $_COOKIE['ID_my_site'];
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Follow Suggestions</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><a href="home.php"><img src="img/logo.jpg" height="100%" /></a><span style="float:right; color:#fff; top:15px; right:10px; position:absolute;"><a href="logout.php"><b>Logout</b></a></span></div>
<div class="box" style="top:20% !important;" align="left">
<h2>Follow suggestions</h2>
<?php

$result = mysql_query("SELECT * FROM users WHERE username != '$username'");
 
while($row = mysql_fetch_array($result))
  {
	  
  $user2 = $row['username'];
  $result1 = mysql_query("SELECT * FROM friends WHERE user1='$user1' AND  user2='$user2'");
  
  $num_rows = mysql_num_rows($result1);
  
  echo $row['Firstname'] . " " . $row['Lastname'] . ', <a href="profile.php?userid=' . $row['username'] . '">@' . $row['username'] . '</a>';
  
  echo "<br>";
  
  if($num_rows > 0)
  {
  echo "<b>Following</b>";
  }
  else {
  echo '<b><a href="follow.php?userid=' . $row['username'] . '">Follow</a></b>';
  }
  
  echo"<p> </p>";
  echo "<br>";
  }
  
 ?>
 <p>&nbsp;  </p>
 <a href="home.php"> <-- Back </a>
  
 </div>
 </body>
</html>