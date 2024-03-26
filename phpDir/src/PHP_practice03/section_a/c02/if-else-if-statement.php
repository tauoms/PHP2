<?php
/* Write your code here */
?>
<!DOCTYPE html>
<html>

<head>
  <title>if else if Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Chocolate</h2>
  <?php
  /* Write your code here */

  $candyStatus = "soon";

  if ($candyStatus == "in stock") {
    echo "In stock.";
  } elseif ($candyStatus == "soon") {
    echo "Coming soon.";
  } elseif ($candyStatus == "out of stock") {
    echo "Out of stock.";
  } else {
    echo "Candy status unavailable.";
  }
  ?>
</body>

</html>