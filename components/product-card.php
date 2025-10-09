<?php
  $name = $name ?? "None";
  $price = $price ?? 0.0;
  $image_path = $image_path ?? "not_found.png";
  $tag = $tag ?? "None";
  $color = $color ?? "black";
?>

<div class="product">
  <img <?php echo "src='../images/$image_path'"?>>
  <div class="product-info">
    <h2><?php echo $name ?></h2>
    <p class="tag" style="background-color: <?php echo $color ?>"><?php echo $tag ?></p>
    <p>Giá: <span class="price"><?php echo $price ?></span></p>
  </div>
  <div class="action-bar">
    <a href="" class="buy" title="Mua ngay"><i class="bi bi-cart-fill"></i></a>
    <a href="" class="see-more" title="Xem thêm"><i class="bi bi-arrow-right-circle"></i></a>
  </div>
</div>