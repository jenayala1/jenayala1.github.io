<?php
	//Start session
	session_start();
	$time = date('m-d-y H:i:s');
	if(isset($_SESSION['SESS_user_ID'])) {
	$studentName = $_SESSION['SESS_user_ID'];
	}

	//Include database connection details
	require_once('config.php');

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}


	$db2 = mysql_select_db("registration") 
                or die("Selecting db2 failed: " . mysql_error());
 		 
                $stdLogout = "update registration.log_tbl set logout = '$time' "
                           . "where s_id = '$studentName' "
                           . "and logout IS NULL  ";
                $sparsed = mysql_query($stdLogout) or die("sparsed Query failed: " . mysql_error());  




//Unset the variables stored in session
	unset($_SESSION['SESS_user_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['LOGGEDUSER']);




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Logged Out</title>
<link href="usernamemodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table align="center">
<tr>
<td>
<h1>Logout </h1>
<p align="center">&nbsp;</p>
<h4 align="center" class="err">You have been logged out.</h4>
<p align="center">Click here to <a href="username-form.php">Log In</a></p>
</td>
</tr>
</table>
</body>
</html>
