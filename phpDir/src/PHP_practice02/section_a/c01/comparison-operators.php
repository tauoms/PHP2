<?php

/* 
  Write you php code here

   */
$stock = 42;

function enoughStock($requestedAmount) {
  global $stock;
  if ($requestedAmount <= $stock) {
    echo "1";
  } else {
    echo "";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Comparison Operators</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Shopping Cart</h2>
  <p>
    <?php echo enoughStock(40); ?>
  </p>
</body>

</html>