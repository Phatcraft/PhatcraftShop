<!-- Kiểm tra user session & load database -->
<!-- Nếu có user session -> Chuyển về trang index.php -->
<?php
  include "./database.php";
  session_start();
  if(!empty($_SESSION["user"])){
    echo "<script>location.replace('/account.php')</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập | Phatcraft Shop</title>
</head>
<body>
  <!-- Navigation bar -->
  <?php $page = "account"; include "./components/nav-bar.php"?>

  <!-- Form đăng ký -->
  <main class="main-form">
    <form action="login.php" method="post">
      <h2>Đăng nhập</h2>
      <div class="input">
        <i class="bi bi-person-fill"></i>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
      </div>
      <div class="input">
        <i class="bi bi-key-fill"></i>
        <input type="password" name="password" placeholder="Mật khẩu" required id="password-input">
        <label class="show-password">
          <input type="checkbox" id="password">
          <i class="bi bi-eye" id="eye-password"></i>
          <i class="bi bi-eye-slash" id="eye-slash-password"></i>
        </label>
      </div>

      <input type="submit" value="Đăng nhập" name="submit">
      <p>Chưa có tài khoản? Đăng ký tại <a href="./signup.php">đây</a></p>
    </form>

    <?php
      if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $raw_password = $_POST["password"];

        // Tìm username tương ứng
        $sql = "SELECT userID, password FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          $user_info = mysqli_fetch_assoc($result);
          $encrypt_password = $user_info["password"];

          if(password_verify($raw_password, $encrypt_password)){
            $_SESSION["user"] = array("userID" => $user_info["userID"], "username" => $username);
            echo "<script>alert('Chào mừng quay trở lại Phatcraft Shop, $username');location.replace('/')</script>";
          }else{
            echo "<script>alert('Mật khẩu không đúng. Vui lòng thử lại')</script>";
          }
        }else{
          echo "<script>alert('Không tìm thấy tên người dùng. Vui lòng thử lại')</script>";
        }
      }
    ?>
</body>
<script src="./scripts/show-password.js"></script>
</html>