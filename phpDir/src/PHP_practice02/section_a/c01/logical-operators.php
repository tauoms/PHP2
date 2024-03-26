<?php 
$item    = 'Chocolate';
$stock   = 5;
$wanted  = 3;
$deliver = true;

function can_buy() {
  global $wanted;
  global $stock;
  global $deliver;

  if (($wanted <= $stock) && ($deliver == true)) {
    echo "Yes";
  } else {
    echo "No";
  }
}
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Logical Operators</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h1>Shopping Cart</h1>
    <p>Item:    <?= $item ?></p>
    <p>Stock:   <?= $stock ?></p>
    <p>Ordered: <?= $wanted ?></p>
    <p>Can buy: <?= can_buy() ?></p>
  </body>
</html>