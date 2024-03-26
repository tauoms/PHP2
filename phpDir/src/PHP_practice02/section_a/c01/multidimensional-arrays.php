<?php

/* 
  Write you php code here

   */

   $offers = [array("Name" => "IBM", "Price" => 4.5, "Stock level" => 3), array("Name" => "Microsoft", "Price" => 2.5, "Stock level" => 6), array("Name" => "Apple", "Price" => 7.2, "Stock level" => 9)];

?>
<!DOCTYPE html>
<html>

<head>
  <title>Multidimensional Arrays</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Offers</h2>

  <?php
  foreach($offers as $company) {
    echo "<ul>";
    foreach($company as $key => $value) {
      echo "$key: $value";
      if ($key === "Price") {
        echo "€";
      }
      echo "<br>";

    }
    echo "</ul>";
  }
  ?>
</body>

</html>