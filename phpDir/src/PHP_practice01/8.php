<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		
	<article class="main-content col-xs-8">
	
	
	<?php  

		// Step 1 -Make a variable with some text as value
		$var = 'Some text';
		// Step 2 - Use crypt() function to encrypt it

		// Step 3 - Assign the crypt result to a variable
		$cryptedVar = crypt($var, '$2a$09$anexamplestringforsalt$');
		// Step 4 - echo the variable
		echo $cryptedVar;

	
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>