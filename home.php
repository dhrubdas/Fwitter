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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home - Fwitter</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><a href="home.php"><img src="img/logo.jpg" height="100%" /></a><span style="float:right; color:#fff; top:15px; right:10px; position:absolute;"><a href="logout.php"><b>Logout</b></a></span></div>
<div class="box" style="top: 20% !important;" align="left">
<?php
$result = mysql_query("SELECT * FROM users WHERE username = '$username'") 
or die(mysql_error());  
?>
<h2> Welcome <?php while($row = mysql_fetch_array( $result )) {
	echo $row['Firstname'];
}
	 ?>, <a href="profile.php?userid=<?php echo "$username"; ?>">@<?php echo "$username"; ?> </a>   </h2>
<?php
$result4 = mysql_query("SELECT * FROM users WHERE username = '$username'");
while ($row4 = mysql_fetch_array( $result4 )) 
{
	echo '<p>"' . $row4["Status"] . '"</p>';
}
?>



<form action="status-update.php" method="post"> <input type="text" width="200" height="150" value="New Tweet" name="status" onFocus="if(this.value == 'New Tweet') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'New Tweet';" >
<input type="submit" value="Tweet" />
</form>

<h2> Recent Tweets From Followed Users</h2>
<?php
$result = mysql_query("SELECT * FROM friends WHERE user1 = '$username'");

$num_rows = mysql_num_rows($result);

if($num_rows < 1) {
	echo 'You are currently following 0 users. <a href="suggest.php"> Click Here </a> for follow suggestions.';
}
else {

while ($row = mysql_fetch_array( $result )) 
{
 $friend = $row['user2'];
 $result1 = mysql_query("SELECT * FROM users WHERE username =      '$friend'");

 while ($row1 = mysql_fetch_array($result1))
 {
	echo '<a href="profile.php?userid=' . $row1['username'] . '">@' . $row1['username'] . '</a> : "' . $row1['Status'] . '"';
	  echo "<p> </p>";
	  echo "<br>";

  }
 
}
?>
<p> </p>
<a href="suggest.php"> More Follow Suggestions </a>
<?php
}


?>


 </div>
 </body>
</html>



