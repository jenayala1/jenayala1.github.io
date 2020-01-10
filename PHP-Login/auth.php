<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_user_ID is present or not
	if(!isset($_SESSION['SESS_user_ID']) || (trim($_SESSION['SESS_user_ID']) == '')) {
		header("location: access-denied.php");
		exit();
	}
?>