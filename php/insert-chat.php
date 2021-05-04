<?php 
	session_start();
include "models.php";

		$og = $_POST['outgoing_id'];
		$ic = $_POST['incoming_id'];
		$message = $_POST['message'];

		$test = new users();
	$test->insert($og, $ic, $message);

 ?>