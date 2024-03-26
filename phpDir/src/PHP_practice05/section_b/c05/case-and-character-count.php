<?php
$text = 'Home sweet home';
?>
<?php include 'includes/header.php'; ?>

<p>
 <?php 
 /* Write your code here 
  Write PHP Code to convert case in lowercase, uppercase, count number of characters and word count*/
  echo "Text: $text <br>";
  echo "lowercase: " . strtolower($text) . "<br>";
  echo "UPPERcase: " . strtoupper($text) . "<br>";
  echo "Character count: " . strlen($text) . "<br>";
  echo "Word count: " . str_word_count($text) . "<br>";
  ?>
</p>

<?php include 'includes/footer.php'; ?>