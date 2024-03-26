<?php
/* 
    Write your code here
     */
    $arr = ["Toffee" => 2.99, "Mints" => 1.99, "Fudge" => 3.49];
?>
<!DOCTYPE html>
<html>

<head>
  <title>foreach Loop</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Price List</h2>
  <table>
    <tr>
      <th>Item</th>
      <th>Price</th>
    </tr>
    <?php
    /* 
    Write your code here
    Create a simple foreach loop for candy products, e.g. Toffee costs 2.99, Mints costs 1.99, and Fudge costs 3.49 and show it in the web page table.
     */

     foreach ($arr as $item => $price) {
      echo "<tr><td>$item</td><td>$price</td></tr>";
     }
    ?>
  </table>
</body>

</html>