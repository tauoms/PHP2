<?php

/* 
  Write you php code here

   */
  $nutrition = array("Fat"=> 34, "Sugar"=> 23, "Salt"=> 6);

  $nutrition["Fat"] = 30;
  $nutrition["Fiber"] = 4;
?>
<!DOCTYPE html>
<html>

<head>
  <title>Updating Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Nutrition (per 100g)</h2>
  <ul>
  <?php 
  foreach ($nutrition as $item => $value) {
    echo "<li>$item : $value g</li>";
  }
  ?>
  </ul>
</body>

</html>