<?php include "functions.php"; 

// Step 2 - Set a cookie that expires in one week
    setcookie('user', 'User Name', time() + (86400 * 7), '/');
		// Step 3 - Start a session and set it to value, any value you want.
    session_start();
    $_SESSION['sessionvariable'] = 'capybara';
    echo "session variable = {$_SESSION['sessionvariable']}";
    ?>

<?php include "includes/header.php"; ?>



<section class="content">

  <aside class="col-xs-4">

    <?php Navigation(); ?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">



    <?php

		/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it */
    ?>
    <a href="9.php?parameter=35">Click here</a>
    <?php
    if (isset($_GET['parameter'])) {
      $parameter = $_GET['parameter'];
      echo "<br> parameter = $parameter";
    }


		?>





  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php"; ?>