<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

  <aside class="col-xs-4">

    <?php Navigation(); ?>

  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php

		/*  Step1: Make a form that submits one value to POST super global


 */
		?>

<form action="6.php" method="post">
Name: <input type="text" name="name"><br>
<input type="submit">
</form>

<?= $_POST["name"] ?? '' ?>
  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php"; ?>