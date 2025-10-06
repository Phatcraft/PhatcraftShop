<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "phatcraft_shop";

  try{
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log('Đã kết nối database thành công')</script>";
  }
  catch(PDOException $e){
    echo "Có lỗi xảy ra. Vui lòng thử lại";
  }
?>
