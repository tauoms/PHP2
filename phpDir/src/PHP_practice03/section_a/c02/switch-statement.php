<?php
/* Write your code here */
?>
<!DOCTYPE html>
<html>

<head>
  <title>switch Statement</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <?php
  /* Write your code here 
  Create a simple switch statement to get 20% off chocolates on Monday and 20% off mints on Tuesday, and in all other cases, it should show “Buy three packs, get one free.”*/

  $weekday = "Monday";
  $chocolatePrice = 5;
  $mintsPrice = 4;

  switch ($weekday) {
    case "Monday":
      $chocolatePrice *= 0.8;
      break;

    case "Tuesday":
      $mintsPrice *= 0.8;
      break;
    
    default:
      echo "Buy three packs, get one free. ";
  }

  echo "Today is $weekday. The price of chocolate is $chocolatePrice and the price of mints is $mintsPrice.";
  ?>

</body>

</html>