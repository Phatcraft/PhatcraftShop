<?php
  $saleValue = $saleValue ?? 0;
  $tagName = $tagName ?? "None";
  $date = $date ?? "";
  $color = $color ?? "red";
?>

<div class="sale">
  <div class="sale-badge" style="background-color: <?php echo $color ?>"></div>
  <div class="sale-info">
    <p class="name"><?php echo "Giảm $saleValue% cho $tagName" ?></p>
    <p class="date"><?php echo $date ?></p>
  </div>
</div>