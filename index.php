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
          $sql = "SELECT
          products.`productID` as productID, products.name as name, products.price as price, products.image_path as image_path,
          tags.name as tagName, tags.color as color
          FROM products JOIN tags ON products.`tagID` = tags.`tagID`
          ORDER BY RAND() LIMIT 3";

          $products = mysqli_query($conn, $sql);

          while($product = mysqli_fetch_assoc($products)){
            $name = $product['name'];
            $price = $product["price"];
            $image_path = $product["image_path"];
            $tag = $product["tagName"];
            $color = $product["color"];
            include "./components/product-card.php";
          }
        ?>
      </div>
    </div>
  </main>

  <!-- Sales -->
  <div class="sales">
    <h1>Chương trình khuyến mãi</h1>
    <div class="sale-list">
      <?php
        $sql = "SELECT 
        ROUND(sales.`saleValue`*100) as saleValue, tags.name as name, sales.`dateCreated` as date,
        tags.color as color
        FROM sales JOIN tags ON sales.`tagID` = tags.`tagID`
        WHERE sales.`isActive` = 1
        ORDER BY RAND()
        LIMIT 3";

        $result = mysqli_query($conn, $sql);
        while($sale = mysqli_fetch_assoc($result)){
          $saleValue = $sale["saleValue"];
          $tagName = $sale["name"];
          $date = $sale["date"];
          $color = $sale["color"];
          include "./components/sale.php";
        }
      ?>
      <div class="sale">
        <div class="sale-badge"></div>
        <div class="sale-info">
          <p class="name">Xem thêm</p>
          <p>Xem thêm các khuyến mãi tại <a href="" style="color: black">đây</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <h2>Phatcraft Shop</h2>
    <p>Được tạo bởi Phatcraft</p>
    <p>Email: phathong0727@gmail.com</p>
  </footer>
</body>
</html>

<!-- Change currency -->
<script src="./scripts/currency.js"></script>
<!-- Format date -->
<script src="./scripts/date.js"></script>

<!-- Close MySQL connection -->
<?php mysqli_close($conn) ?>