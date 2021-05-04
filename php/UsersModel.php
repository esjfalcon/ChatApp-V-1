<?php 
session_start();
include "models.php";

$userss = new users();



$uid = $_SESSION['unique_id'];


				
				// $sql2 = $this->conn->query($query2);	


				

					
				// 

				// strlen($resultt) > 28 ? $msg = substr($resultt, 0, 28) : $msg = $resultt;


$users = $userss->users($_SESSION['unique_id']);

// print_r($users);

 ?>