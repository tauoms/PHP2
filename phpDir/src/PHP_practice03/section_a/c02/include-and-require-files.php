<?php
/* Write your code here 

Write a PHP Code to include header.php and footer.php and check the candy stock. Let us assume you have 25 stock of candy, so check if you have “Good availability”, you have “low stock”, or you are running “Out of stock.”*/
require './includes/header.php'
?>


<h2>Chocolate</h2>
<?php
/* Write your code here */

$candyStock = 20;

if ($candyStock == 0) {
    echo "Out of stock";
} elseif ($candyStock < 10) {
    echo "Low stock";
} else {
    echo "Good availability";
}

include './includes/footer.php';
?>