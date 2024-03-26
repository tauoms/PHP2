<?php

/* 
  Write you php code here

   */

function calcSubTotal($amount, $price) {
  return "Subtotal: " . $amount * $price . "€";
}

function calcTotal($amount, $price, $tax) {
  $taxAmount = ($tax / 100) * $amount * $price;
  return "Total: " . $amount * $price + $taxAmount . "€ (inc. tax $tax%)";
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Mathematical Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Shopping Cart</h2>
  <?php
  echo "<p>" . calcSubTotal(3, 5) . "</p>";
  echo "<br>";
  echo "<p>" . calcTotal(3, 5, 20) . "</p>";
  ?>
</body>

</html>