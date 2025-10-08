<?php include("./database.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ | Phatcraft Shop</title>
</head>
<body>
  <!-- Navigation bar -->
  <nav class="nav-bar">
    <h3>Phatcraft Shop</h3>
    <div class="nav-list">
      <a href="/" class="choose" title="Trang chủ"><i class="bi bi-house-fill"></i></a>
      <a href="" class="normal" title="Cửa hàng"><i class="bi bi-bag-fill"></i></a>
      <a href="" class="normal" title="Tài khoản"><i class="bi bi-person-fill"></i></a>
      <a href="" class="normal cart" title="Giỏ hàng">
        <i class="bi bi-cart-fill"></i>
        <div class="amount">
          <p>0</p>
        </div>
      </a>
    </div>
  </nav>

  <!-- Main page -->
  <main>
    <div class="welcome">
      <h2>Chào mừng đến với Phatcraft Shop</h2>
      <p>Bạn có thể mua sắm hàng hóa với giá cả phải chăng nhất tại đây</p>
    </div>

    <!-- Load random products -->
    <div class="products">
      <h1>Các sản phẩm tiêu biểu</h1>
      <div class="products-list">
        <?php
          $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
          $products = mysqli_query($conn, $sql);

          while($product = mysqli_fetch_assoc($products)){
            $name = $product['name'];
              $price = $product["price"];
              $image_path = $product["image_path"];
              include "./components/product-card.php";
          }

          mysqli_close($conn)
        ?>
      </div>
    </div>
  </main>
</body>
</html>

<!-- Change currency -->
<script src="./scripts/currency.js"></script>