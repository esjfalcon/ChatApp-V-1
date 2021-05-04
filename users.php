<?php

  include_once "php/UserModel.php";
  // include_once "php/UsersModel.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <div><img src="logo.png" class="" style="height: 70px; width: 70px;"></div>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>




<div class="wrapper">
    <section class="users">

      <header>

<?php 

foreach ($user as $usr) {
 ?>
        <div class="content">
          <img src="php/images/<?php echo $usr['img']; ?>" alt="user image profile">
          <div class="details">
            <span><?php echo $usr['fnam']; ?></span>
            <p><?php echo $usr['status']; ?></p>
          </div>
        </div>
        <a href="" class="logout">Logout</a>
        <?php } ?>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list"></div>
    </section>
  </div>






<script type="text/javascript" src="javascript/users.js"></script>
<script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
</body>
</html>