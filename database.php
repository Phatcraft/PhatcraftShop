<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "phatcraft_shop";
  $conn = "";

  try{
    $conn = mysqli_connect($host, $user, $password, $database);
    echo "<script>console.log('Kết nối database thành công')</script>";
  }
  catch(mysqli_sql_exception){
    echo "<script>console.log('Lỗi khi kết nối database')</script>";
  }
?>