<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        
        <?php 
          $hostname = "localhost";
          $username = "root";
          $password = "";
          $dbname = "chatapp";

          $conn = mysqli_connect($hostname, $username, $password, $dbname);
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>


        <img src="php/images/<?php echo $row['img']; ?>" alt="profile">
        <div class="details">
          <span><?php echo $row['fnam']; ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area" method="POST">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="hidden" class="incoming_id" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>


  <script src="https://kit.fontawesome.com/c0b336cd5f.js" crossorigin="anonymous"></script>
  <script src="javascript/chat.js"></script>

</body>
</html>
