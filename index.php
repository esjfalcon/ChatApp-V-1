<?php 
session_start();

if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
 ?>


<!DOCTYPE html>
<html>
<head>



	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="wrapper">
    <section class="form login">
      <header><div><img src="logo.png" class="" style="height: 70px; width: 70px;"></div>ESSAJI Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
    </section>
  </div>


<script type="text/javascript" src="javascript/password-toggle.js"></script>
<script type="text/javascript" src="javascript/login.js"></script>
<script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
</body>
</html>