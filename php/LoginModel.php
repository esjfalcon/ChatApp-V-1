<?php 

include "models.php";


$login = new users();
$test = $login->login($_POST['email'], $_POST['password']);
echo $test;


 ?>