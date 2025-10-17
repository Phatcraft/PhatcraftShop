<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ - Phatcraft Shop</title>
</head>
<body>
  <?php
    $page = "home";
    $cart_amount = 0;
    include "./resources/components/nav-bar.php";
  ?>

  <main>
    <div class="welcome-page">
      <h2>Chào mừng đến với Phatcraft Shop</h2>
      <p>Bạn có thể mua các sản phẩm tại đây với giá cả phải chăng nhất</p>
    </div>
  </main>
</body>
</html>