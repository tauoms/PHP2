<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

  <aside class="col-xs-4">

    <?php Navigation(); ?>

  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">

    <?php



    /* 
			 Step 1:  Use the Echo Function to say hello with html h1 tags embedded inside php

		   Step 2: Write a comment above the echo function and explain
		   what that function is doing.


		   */

        // Explanation: Close php, write HTML h1 opening tag, open php tag, use echo to generate text, closing php tag, closing HTML h1 tag, opening php tag, closing php tag
       ?><h1><?php echo "Hello"?></h1>
<?php
    ?>

    // OR:

    <?php echo "<h1>Hello</h1>" ?>




  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php"; ?>