<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
<section class="content">

  <aside class="col-xs-4">
    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php 


/* Step1: Use a pre-built math function here and echo it */

echo ceil(7.5) . "<br>";

/* Step 2:  Use a pre-built string function here and echo it */

echo "The length of 'This is a string' is: " . strlen("This is a string") . "<br>";

/* Step 3:  Use a pre-built Array function here and echo it */

$arr = array("first key" => 10, "second key" => 20);

print_r(array_keys($arr));

?>





  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php"; ?>