<?php
$conn = mysql_connect("localhost", "dbuser", "hddtmghsc") 
  or die(mysql_error()); 
 $db = mysql_select_db("registration") 
  or die("Selecting db1 failed: " . mysql_error());
  
?>
