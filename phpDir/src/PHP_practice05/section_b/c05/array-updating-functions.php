<?php
// Write your code here

$arr = ["notebook", "pencil", "eraser"];

array_unshift($arr, "ruler");
array_pop($arr);

?>
<?php include 'includes/header.php'; ?>

<h1>Order</h1>
<p>
<?php 
foreach ($arr as $item) {
    echo $item . "<br>";
} 
?>
</p>
<?php include 'includes/footer.php'; ?>