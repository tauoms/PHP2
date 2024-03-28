<?php
if(isset($_POST['submit'])) {
    // echo "Data received";
    $user = $_POST['username'];
    $pass = $_POST['password'];
}

// Validate form inputs
if($user && $pass) {
    echo $user . " " . $pass;
} else {
    echo "Username and password fields can not be blank. ";
}

$host = 'db';

// database username
$dbname = 'loginapp';
$dbuser = 'root';
$dbpass = 'lionPass';

// Check MySQL connection satus
$conn = new mysqli($host, $dbuser, $dbpass, $dbname); // MySQL interface, connection between PHP and mySQL db
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server succesfully!";
}

?>

<form action="login.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="Submit">
</form>

