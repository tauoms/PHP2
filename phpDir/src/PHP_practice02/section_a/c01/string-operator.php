<?php

/* 
  Write you php code here

   */
$customerName = "Mss. Jackson"
?>
<!DOCTYPE html>
<html>

<head>
  <title>String Operator</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <p>
    <?php 
    echo "$customerName's Order: <br>" . "Thank you, $customerName";
    ?>
  </p>
</body>

</html>