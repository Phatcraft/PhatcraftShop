<!-- Kiểm tra user session & load database -->
<!-- Nếu có user session -> Chuyển về trang index.php -->
<?php
  include "./database.php";
  session_start();
  if(!empty($_SESSION["user"])){
    header("Location: index.php");
    exit();
  }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký | Phatcraft Shop</title>
</head>
<body>
  <!-- Navigation bar -->
  <?php $page = "account"; include "./components/nav-bar.php"?>

  <!-- Form đăng ký -->
  <main class="main-form">
    <form action="signup.php" method="post">
      <h2>Đăng ký</h2>
      <div class="input">
        <i class="bi bi-person-fill"></i>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
      </div>
      <div class="input">
        <span>@</span>
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input">
        <i class="bi bi-key-fill"></i>
        <input type="password" name="password" placeholder="Mật khẩu" required>
      </div>
      <div class="input">
        <i class="bi bi-key-fill"></i>
        <input type="password" name="confirm-password" placeholder="Xác nhận mật khẩu" required>
      </div>

      <input type="submit" value="Đăng ký" name="submit">
      <p>Đã có tài khoản? Đăng nhập tại <a href="">đây</a></p>
    </form>

    <!-- Xử lý form -->
    <?php
      if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];

        // Kiểm tra password và password confirm
        if($password != $confirm_password){
          echo "<script>alert('Mật khẩu và xác nhận mật khẩu không khớp. Vui lòng thử lại')</script>";
        }else{
          $userID = random_bytes(16);
          $hash_password = password_hash($password, PASSWORD_BCRYPT);

          $sql = "INSERT INTO users(userID, username, email, password)
                  VALUES ('$userID', '$username', '$email', '$hash_password')";
          try{
            mysqli_query($conn, $sql);
            $_SESSION["user"] = array("userID" => $userID, "username" => $username);
            echo "<script>alert('Chào mừng đến với Phatcraft Shop, $username');location.replace('/')</script>";
          }
          catch(mysqli_sql_exception){
            echo "<script>alert('Tên tài khoản hoặc email đã được dùng. Vui lòng thử lại')</script>";
          }
        }
      }
    ?>
  </main>

</body>
</html>