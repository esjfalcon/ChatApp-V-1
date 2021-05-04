<?php 
include "models.php";
$users = new users();
$seaarch = $users->search($_POST['searchTerm']);
 ?>