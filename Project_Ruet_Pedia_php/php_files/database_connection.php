<?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  //creating connection
  $conn = mysqli_connect($servername, $username, $password, "ruet_pedia");

  if (!$conn) {
    die("connection error" . mysqli_connect_error());
  }
?>