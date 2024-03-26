<?php
/* Write your code here */
?>
<!DOCTYPE html>
<html>

<head>
  <title>while Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Prices for Multiple Packs</h2>
  <p>
    <?php
    /* Write your code here 
    Create a simple while loop to find prices for multiple packs of candy. For example, if one pack costs $1.99 how much would 5 pack costs? Display the prices for all 5 packs of candy. 
*/

$amount = 5;
$price = 1.99;
$i = 0;
$totalPrice = 0;

while ($i < $amount) {
  $totalPrice += $price;
  $i++;
}

echo $totalPrice;
    ?>
  </p>
</body>

</html>