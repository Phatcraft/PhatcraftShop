<!-- Thêm database connection -->
<?php include("./database.php") ?>
<?php session_start() ?>

<!-- HTML -->
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
  <?php $page = "home"; include "./components/nav-bar.php"?>

  <!-- Main page -->
  <main>
    <div class="welcome">
      <?php
        if(empty($_SESSION["user"])){
          echo "<h2>Chào mừng đến với Phatcraft Shop</h2>
          <p>Bạn có thể mua sắm hàng hóa với giá cả phải chăng nhất tại đây</p>";
        }else{
          $username = $_SESSION["user"]["username"];
          echo "<h2>Chào mừng quay trở lại, $username</h2>
          <p>Bạn có thể mua sắm hàng hóa với giá cả phải chăng nhất tại đây</p>";
        }
      ?>
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
        if(mysqli_num_rows($result) > 0){
          while($sale = mysqli_fetch_assoc($result)){
            $saleValue = $sale["saleValue"];
            $tagName = $sale["name"];
            $date = $sale["date"];
            $color = $sale["color"];
            include "./components/sale.php";
          }
          echo "
          <div class='sale'>
            <div class='sale-badge'></div>
              <div class='sale-info'>
                <p class='name'>Xem thêm</p>
                <p>Xem thêm các khuyến mãi tại <a href='' style='color: black'>đây</a></p>
              </div>
            </div>
          </div>";
        }else{
          echo "
          <div class='sale'>
            <div class='sale-badge'></div>
              <div class='sale-info'>
                <p class='name'>Không có khuyến mãi</p>
                <p>Không có khuyến mãi khả dụng hiện tại</p>
              </div>
            </div>
          </div>";
        }
      ?>
      
  </div>

  <!-- Account -->
  <?php
    if(empty($_SESSION["user"])){
      echo "<div class='accounts'>
      <h1>Bắt đầu với Phatcraft Shop</h1>
      <div class='account-list'>
        <div class='account'>
          <i class='bi bi-person-lock'></i>
          <p>Đăng nhập tài khoản tại <a href='./login.php'>đây</a></p>
        </div>
        <div class='account'>
          <i class='bi bi-person-plus'></i>
          <p>Tạo tài khoản mới tại <a href='./signup.php'>đây</a></p>
        </div>
      </div>
    </div>";
    }
  ?>

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