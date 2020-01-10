<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
		echo "$str is clean \n\n";
	}
	
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'username ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
      //========================= logged in check ================
	include('connect.php');
	$logger = "SELECT * FROM registration.log_tbl WHERE s_id='$username' AND logout is NULL";
	$result2 = mysql_query($logger, $conn) or die("Query failed: " . mysql_error()); 


	if ($result2) {

		if (mysql_num_rows($result2) > 0) {  
			$_SESSION['SESS_user_ID'] = $username;

			$errmsg_arr[] = 'You are already logged in $result2';
			$errflag = true;
			header("location: user_in_logs.php");
			exit();
		}
	}

	 //========================= End logged in check ================

	//If there are input validations, redirect back to the username form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: username-form.php");
		exit();
	}

	
	//Create query
	

	$qry="SELECT * FROM user_info WHERE username='$username' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);


	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//username Successful
			session_regenerate_id();
			$user = mysql_fetch_assoc($result);
			$_SESSION['SESS_user_ID'] = $user['username'];
			$_SESSION['SESS_FIRST_NAME'] = $user['first_name'];
			$_SESSION['SESS_last_name'] = $user['last_name'];
			session_write_close();
			header("location: user-index.php");
			exit();
		  } 
		 else {
			//username failed
			header("location: username-failed.php");
			exit();
		   }

	  }
   else {
		die("Query failed");            

	}
?>
