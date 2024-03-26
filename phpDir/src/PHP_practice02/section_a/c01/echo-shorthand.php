<?php

/* 
  Write you php code here

   */

   $name = "Name";
   $favorites = ["Chocolate", "Mints", "Fudge", "Bubblegum", "Toffee", "Jelly Beans"];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Echo Shorthand</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <?= "$name" ?>
  <br>
  <?php 
  foreach ($favorites as $item) {
    echo "$item, ";
  }
    ?>
</body>

</html>