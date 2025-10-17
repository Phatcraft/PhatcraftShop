<?php
  $page = $page ?? "home";
  $cart_amount = $cart_amount ?? 0;
?>
<nav>
  <h2>Phatcraft Shop</h2>
  <div class="nav-list">
    <a href="/" <?php if($page == "home") echo "class='choose'" ?> title="Trang chủ">
      <i class="bi bi-house-fill"></i>
    </a>
    <a href="" <?php if($page == "shop") echo "class='choose'" ?> title="Cửa hàng">
      <i class="bi bi-bag-fill"></i>
    </a>
    <a href="" <?php if($page == "account") echo "class='choose'" ?> title="Tài khoản">
      <i class="bi bi-person-fill"></i>
    </a>
    <a href="" <?php if($page == "cart") echo "class='choose'" ?> title="Giỏ hàng">
      <i class="bi bi-cart-fill"></i>
      <div class="badge"><?php echo $cart_amount ?></div>
    </a>
  </div>
</nav>