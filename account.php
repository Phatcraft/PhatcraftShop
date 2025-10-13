<?php
  include "./database.php";
  session_start();
  if(empty($_SESSION["user"])) echo "<script>location.replace('/login.php')</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION["user"]["username"]?> | Phatcraft Shop</title>
</head>
<body>
  <?php $page = "account"; include "./components/nav-bar.php";?>

  <?php
    // Get user info
    $userID = $_SESSION["user"]["userID"];
    $sql = "SELECT userID, username, email FROM users WHERE userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $user_info = mysqli_fetch_assoc($result);
  ?>

  <main class="main-account">
    <div class="account-info">
      <h2><?php echo $user_info["username"]?></h2>
      <p><label>ID: </label><?php echo $user_info["userID"]?></p>
      <p><label>Email: </label><?php echo $user_info["email"]?></p>
      <div class="action-bar">
        <button id="email">Cập nhật email</button>
        <button id="logout">Đăng xuất tài khoản</button>
      </div>
    </div>
  </main>
</body>
<script src="./scripts/account.js"></script>
</html>