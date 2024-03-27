<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>
<section class="content">

  <aside class="col-xs-4">

    <?php Navigation(); ?>


  </aside>
  <!--SIDEBAR-->

  <article class="main-content col-xs-8">


    <?php

		/*  Step 1: Use the Make a class called Dog */
    /* Step 2: Set some properties for Dog, Example, eye colors, nose, or fur color */
    /* Step 4: Make a method named ShowAll that echos all the properties */

    class Dog {
      public $name;
      public $breed;
      public $color;

      function showAll() {
        echo "Name: {$this->name} <br> Breed: {$this->breed} <br> Color: {$this->color}";
      }
    }

		/* Step 5: Instantiate the class / create object and call it pitbull */

    $pitbull = new Dog();
    $pitbull->name = "Dot";
    $pitbull->breed = "Pitbull";
    $pitbull->color = "Grey"; 

    /* Step 6: Call the method ShowAll */

    $pitbull->showAll();

		?>





  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php"; ?>