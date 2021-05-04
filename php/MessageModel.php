<?php 
session_start();
	include "models.php";
	$messages = new users();

	$og = $_POST['outgoing_id'];
	$ic = $_POST['incoming_id'];
	$messages->message($og, $ic);
	
 ?>