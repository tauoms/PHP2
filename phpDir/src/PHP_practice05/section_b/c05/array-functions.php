<?php
// Write PHP code here
$greetings = ["Hi", "Howdy", "Hello", "Hola", "Cia", "Moi", "Namaste", "Welcome"];
$bestSellers = ["notebook", "pencil", "ink"];
$customerDetails = ["firstname" => "Hannah", "lastname" => "Gatsby", "email" => "hannah@null.nothing"];
?>
<?php include 'includes/header.php'; ?>

<p>
    <?= "{$greetings[array_rand($greetings)]} {$customerDetails["firstname"]} !"; ?>
</p>

<h1>Best Sellers</h1>
<ol>
<?php
foreach ($bestSellers as $item) {
    echo "<li>$item</li>";
}
echo "Item count: " . count($bestSellers); 
?>
</ol>
<?php include 'includes/footer.php'; ?>