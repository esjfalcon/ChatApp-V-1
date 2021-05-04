<?php 
session_start();


	
include "models.php";

$chek = new users();

$chek->signup($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);


 ?>