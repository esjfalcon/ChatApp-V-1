<?php 
session_start();
include "models.php";

$users = new users();
$user = $users->user();

$userss = $users->users($_SESSION['unique_id']);



 ?>