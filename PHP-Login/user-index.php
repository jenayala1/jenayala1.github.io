<?php
//Start session
	session_start();
	

	require_once('auth.php');


	$username = $_SESSION['SESS_user_ID'];

	IF (!$username) {  
	header("location: user_in_logs.php");
	exit();

	 }

	$time = date('m-d-y H:i:s'); 
	include('connect.php');
	$logger = "insert into registration.log_tbl(s_id, login) values ('$username', '$time')";
	$result2 = mysql_query($logger, $conn) or die("Query failed: " . mysql_error()); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>user Index</title>
<link href="usernamemodule.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table align="center">
<tr><td>
<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>

<p>You have logged in. Please do not forget to log out as you leave. </p>
<!-- <a href="user-profile.php">My Profile</a> | -->
 <a href="logout.php">Logout</a>
</td></tr>
</table>
</body>
</html>
