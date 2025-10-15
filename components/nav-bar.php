<?php
  $page = $page ?? "home";
?>
<nav class="nav-bar">
    <h3>Phatcraft Shop</h3>
    <div class="nav-list">
      <a href="/" class="<?php if($page == "home") echo 'choose'; else echo 'normal' ?>" title="Trang chủ">
        <i class="bi bi-house-fill"></i>
      </a>
      <a href="/products" class="<?php if($page == "shop") echo 'choose'; else echo 'normal' ?>" title="Cửa hàng">
        <i class="bi bi-bag-fill"></i>
      </a>
      <a href="/account.php" class="<?php if($page == "account") echo 'choose'; else echo 'normal' ?>" title="Tài khoản">
        <i class="bi bi-person-fill"></i>
      </a>
      <a href="" class="<?php if($page == "cart") echo 'choose'; else echo 'normal' ?> cart" title="Giỏ hàng">
        <i class="bi bi-cart-fill"></i>
        <div class="amount">
          <p>0</p>
        </div>
      </a>
    </div>
  </nav>