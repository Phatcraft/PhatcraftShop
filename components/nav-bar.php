<?php
  $page = $page ?? "home";
?>
<nav>
  <h1>Phatcraft Shop</h1>
  <div class="nav-list">
    <a href="/" <?php if($page == "home") echo "class='choose'"?> title="Trang chủ">
      <i class="bi bi-house-fill"></i></a>
    <a href="" <?php if($page == "shop") echo "class='choose'"?> title="Cửa hàng">
      <i class="bi bi-bag-fill"></i></a>
    <a href="" <?php if($page == "account") echo "class='choose'"?> title="Tài khoản">
      <i class="bi bi-person-fill"></i></a>
  </div>
</nav>