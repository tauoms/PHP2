<?php

/**
 * Write your code here
 
 Create three functions to generate the values as shown in this table. Price for Toffee is 3, Mints is 2 and Fudge is 8. -The first function should look at stock levels and create a message indicating whether or not more stock should be ordered. If the stock is less than 10 no Re-Order necessary. -The second function should find the total value of stock for each item that is sold. -And finally the third function should calculate how much tax will be due when all of the remaining stock has been sold. 

 */

$toffee = ["name" => "Toffee", "price" => 3, "stock" => 12];
$mints = ["name" => "Mints", "price" => 2, "stock" => 26];
$fudge = ["name" => "Fudge", "price" => 8, "stock" => 8];
$arr = [$toffee, $mints, $fudge];
$tax = 20;

/* Santosh version:
function get_reorder_message(int $stock): string {
  return ($stock < 10) ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float {
  return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax = 0): float {
  return ($price * $quantity) * ($tax / 100);
}

*/

function reOrder($item) {
  if ($item["stock"] < 10) {
    return "Yes";
  } else {
    return "No";
  }
}

function totalValue($item) {
  return "$ " . $item["stock"] * $item["price"];
}

function taxDue($item) {
  return "$ " . $item["stock"] * $item["price"] * 0.2;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Basic Functions</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Stock Control</h2>
  <table>
    <tr>
      <th>Product</th>
      <th>Stock</th>
      <th>Re-order</th>
      <th>Total value</th>
      <th>Tax due</th>
    </tr>
    <?php
    /**
     * Write your code here
     */

     foreach ($arr as $candy) {
      echo "<tr>";
      echo "<td>" . $candy["name"] . "</td>";
      echo "<td>" . $candy["stock"] . "</td>";
      echo "<td>" . reOrder($candy) . "</td>";
      echo "<td>" . totalValue($candy) . "</td>";
      echo "<td>" . taxDue($candy) . "</td>";
      echo "</tr>";
     }
    ?>

<?php 
/* Santosh version: 
foreach ($candy as $product => $data) { ?>
    <tr>
      <td><?= $product ?></td>
      <td><?= $data['stock'] ?></td>
      <td><?= get_reorder_message($data['stock']) ?></td>
      <td><?= get_total_value($data['price'], $data['stock']) ?></td>
      <td><?= get_tax_due($data['price'], $data['stock'], $tax) ?></td>
    </tr>
    <?php } */ ?>
    
  </table>
</body>

</html>