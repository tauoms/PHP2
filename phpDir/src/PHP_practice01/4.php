<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
		
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php  

/*  Step1: Define a function and make it return a calculation of 2 numbers

	Step 2: Make a function that passes parameters and call it using parameter values


 */

 function sum($num1, $num2) {
	echo $num1+$num2;
 }

 sum(34, 6);

 function phrase($str1, $str2) {
	echo $str1 . $str2;
 }

 phrase("This and", " that");

?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php"; ?>