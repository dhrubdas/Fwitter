<?php if (isset($_COOKIE['ID_my_site']))
{
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to Fwitter</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div style="background-color:#F90; height:50px; width:100%; top: 0px; left: 0; right: 0px; border-bottom: 1px #CCC solid; position:absolute;" align="center"><img src="img/logo.jpg" height="100%" /><span style="float:right; color:#fff; top:15px; right:10px; position:absolute;"><a href="logout.php"><b>Logout</b></a></span></div>

<div class="box" align="center"> <h2> Welcome to Fwitter, <a href="login.php">Login</a> or <a href="add.php"> Sign Up </a> </h2> </div>

</body>
</html>