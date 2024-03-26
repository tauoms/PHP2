<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

 $ifVar = 2;

 if ($ifVar == 0) {
	echo "Zero";
 } elseif ($ifVar == 1) {
	echo "One";
 } else {
	echo "I love PHP";
 }
	
 for ($i = 0; $i < 10; $i++) {
	echo "$i ";
 }

 switch ($ifVar) {
	case 1:
		echo "The number is 1";
		break;
	case 2:
		echo "The number is 2";
		break;
	case 3:
		echo "The number is 3";
		break;
	case 4:
		echo "The number is 4";
		break;
	case 5:
		echo "The number is 5";
		break;
	default:
		echo "This is the default message";
 }

?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>