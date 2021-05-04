<?php 
	
	$host = "localhost";
	$db = "chatapp";
	$usr = "root";
	$pass = "";
	
	$conn = mysql_connect($host, $usr, $pass, $db);

	echo $conn ? "connected": "error";

 ?>