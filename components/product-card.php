<?php
  $name = $name ?? "None";
  $price = $price ?? 0.0;
  $image_path = $image_path ?? "not_found.png";
?>

<div class="product">
  <img <?php echo "src='../images/$image_path'"?>>
  <div class="product-info">
    <h2><?php echo $name ?></h2>
    <p>Giá: <span class="price"><?php echo $price ?></span></p>
  </div>
</div>