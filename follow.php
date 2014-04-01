<?php
 mysql_connect("fwitterusers.db.11414190.hostedresource.com", "fwitterusers", "Fwit@123") or die(mysql_error()); 
 mysql_select_db("fwitterusers") or die(mysql_error());
 
 $user2 = $_GET['userid'];
 $user1 = $_COOKIE['ID_my_site'];
 
 $result = mysql_query("SELECT * FROM friends WHERE user1='$user1' AND  user2='$user2'");
 
if(mysql_num_rows($result) > 0)
{
echo "You are already following this person";
}
else {
mysql_query("INSERT INTO friends (user1, user2)
VALUES ('$user1', '$user2')");

header("location: suggest.php");
}

 
 
?>


