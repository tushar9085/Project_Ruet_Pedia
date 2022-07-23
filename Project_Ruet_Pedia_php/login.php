<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/index_assets/img/logo.ico">
  <title>Sign In</title>


  <link rel="stylesheet" href="assets/alerts/css/style.css">
  <link rel="stylesheet" href="assets/login_assets/css/style.css">


</head>

<body>

  <!-- Popup Alert -->
  <?php
  if (isset($_SESSION['status'])) {
  ?>

    <div class="alert alert-success" role="alert" id="popup-alert" style="display: block;">

      <div class="alert-items" style="display: flex;justify-content: space-between;">
        <div class="popup-message">
          <?php echo $_SESSION['status']; ?>
        </div>

        <div class="close-button">
          <button class="close-button" onclick="myFunction()">x</button>
        </div>

      </div>


    </div>


  <?php
    unset($_SESSION['status']);
  }
  ?>
  <!-- Popup Alert -->

  <?php
  include("php_files/database_connection.php");
  ?>

  <?php

  if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE email= '$email' AND password='$password';";

    $result = mysqli_query($conn, $sql);
    $resultFecth = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);

    $user_id = $resultFecth['id'];
    $image = $resultFecth['profile_picture'];

    if ($num == 1) {
      $_SESSION['status'] = "Welcome " . $resultFecth['name'] . " To Your Account!";
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['loggedin'] = true;
      header("location:main_account.php");
    } else {
      $_SESSION['status'] = "Wrong Credentials!";
      header("location:login.php");
    }
  }

  ?>



  <div class="container">
    <div class="box">
      <a href="index.php">
        <div class="heading">
          <img src="assets/index_assets/img/logo.png" alt="" height="30%" width="30%">
        </div>
      </a>
      <form class="login-form" action="login.php" method="post">
        <div class="field">
          <input id="email" type="email" name="email" placeholder="Email" />

        </div>
        <div class="field">
          <input id="password" type="password" name="password" placeholder="Password" />
        </div>
        <button class="login-button" name="login">Log In</button>

        <div class="other">
          <a class="forgot-password" href="#">Forgot password?</a>
        </div>
      </form>
    </div>
    <div class="box">
      <p>Don't have an account? <a class="signup" href="sign_up.php">Sign Up</a></p>
      <p><a class="signup" href="index.php">Return to Main Page</a></p>
    </div>
  </div>

  <script src="assets/alerts/js/main.js"></script>
</body>

</html>