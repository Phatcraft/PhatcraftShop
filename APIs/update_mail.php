<?php
  include "../database.php";
  session_start();
  if(empty($_SESSION["user"])) echo "<script>location.replace('/')</script>";

  $email = $_GET["email"];
  $userID = $_SESSION["user"]["userID"];
  $sql = "UPDATE users SET email='$email' WHERE userID='$userID'";

  try{
    mysqli_query($conn, $sql);
    echo "<script>alert('Email đã được cập nhật')</script>";
  }
  catch(mysqli_sql_exception){
    echo "<script>alert('Email đã được dùng. Vui lòng thử lại')</script>";
  }
  echo "<script>location.replace('../account.php')</script>"
?>