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
  <title>Sign Up</title>
  <link rel="stylesheet" href="assets/signup_assets/css/style.css">
  <link rel="stylesheet" href="assets/alerts/css/style.css">
</head>

<body>


  <!-- Popup Alert -->
  <?php
  if (isset($_SESSION['status'])) {
  ?>

    <div class="alert alert-success" role="alert" id="popup-alert">

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
  $servername = "localhost";
  $username = "root";
  $password = "";

  //creating connection
  $conn = mysqli_connect($servername, $username, $password, "ruet_pedia");

  if (!$conn) {
    die("connection error" . mysqli_connect_error());
  }


  if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roll = $_POST['roll'];
    $department = $_POST['department'];
    $img_name = $_FILES['profile_picture']['name'];






    //Checking unique emails
    $existSql = "SELECT * FROM `user` WHERE email = '$email';";
    $existResult = mysqli_query($conn, $existSql);
    $existRow = mysqli_num_rows($existResult);

    if ($existRow > 0) {
      $exist = true;
    } else {
      $exist = false;
    }


    if (!$exist) {
      //Extracting image extension
      $image_extension = pathinfo($img_name, PATHINFO_EXTENSION);
      //changing the image name unique
      $profile_picture = 'image_' . date("mjYHis") . '.' . $image_extension;
      //moving the image into folder
      move_uploaded_file($_FILES['profile_picture']['tmp_name'],'images/'.$profile_picture);
     

      $sql = "INSERT INTO `user` (`name`, `email`, `password`, `roll`,`department`, `profile_picture`) 
                    VALUES ('$name', '$email', '$password', '$roll','$department', '$profile_picture');";

      $result = mysqli_query($conn, $sql);
      if ($result) {
        $_SESSION['status'] = "Registration successful! Please Login";
        header("location:login.php");
      }
    } else {
      $_SESSION['status'] = "Email Exists!";
      header("location:sign_up.php");
    }
  }

  ?>

  <!-- main site -->
  <div class="container">
    <div class="box">
      <a href="index.php">
        <div class="heading">
          <img src="assets/index_assets/img/logo.png" alt="" height="30%" width="30%">
        </div>
      </a>
      <form class="login-form" action="sign_up.php" method="post" enctype="multipart/form-data">

        <div class="field">
          <input type="text" name="name" id="name" placeholder="Full Name *" required />
        </div>

        <div class="field">
          <input type="email" name="email" id="email" placeholder="Email *" required />
        </div>

        <div class="field">
          <input type="password" name="password" id="password" placeholder="Password *" required>
        </div>

        <div class="field">
          <input type="password" placeholder="Confirm Password *" id="confirm_password" required>
        </div>

        <div class="field">
          <input type="text" name="roll" id="roll" placeholder="Roll" />
        </div>

        <div class="field">
          <input type="text" name="department" id="department" placeholder="Department" />
        </div>


        <div class="field">
          <p>Upload a profile Picture</p>
          <input type="file" name="profile_picture" id="profile_picture">
        </div>

        <button class="signup-button" name="signup">Sign Up</button>


      </form>
    </div>
    <div class="box">
      <p>Already Have an account? <a class="signup" href="login.php">Sign In</a></p>
      <p><a class="signup" href="index.php">Return to Main Page</a></p>
    </div>
  </div>
</body>

<script src="assets/signup_assets/js/confirm_pass.js"></script>
<script src="assets/alerts/js/main.js"></script>

</html>