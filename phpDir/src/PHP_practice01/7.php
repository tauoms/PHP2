<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/

$host = 'db';
// Database user name
$dbname = 'db7';
$user = 'root';
//database user password
$pass = 'lionPass';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
$query = "SELECT * FROM reports"; //Select everything from users table


$result = mysqli_query($conn, $query);

if (!$result) {
    die('Reading db records failed');
}

// READ rows from db
while ($row = mysqli_fetch_assoc($result)) { // Fetch arrays from db
    ?>
    <pre>
        <?php print_r($row); ?>
    </pre>
    <?php
}
?>
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
