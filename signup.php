<?php 
session_start();


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header><div><img src="logo.png" class="" style="height: 70px; width: 70px;"></div>ESSAJI Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="index.php">Login now</a></div>
    </section>
  </div>

<script type="text/javascript" src="javascript/signup.js"></script>
<script type="text/javascript" src="javascript/password-toggle.js"></script>
<script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
</body>
</html>