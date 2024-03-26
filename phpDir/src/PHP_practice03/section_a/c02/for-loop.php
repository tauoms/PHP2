<?php
/* Write your code here 
Create a simple for loop to find the prices of multiple candy packs. Let us assume one pack of candy costs $1.99. How much did ten packs cost? Display each pack's costs on the web page.*/

$amount = 10;
$price = 1.99;
$totalPrice = 0;

for ($i = 0; $i < $amount; $i++) {
  $totalPrice += $price;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>for Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <p>
    <?php
    /* Write your code here */
    echo "Total: $totalPrice";
    ?>
  </p>
</body>

</html>