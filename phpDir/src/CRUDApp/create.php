<?php

$user = '';
$pass = '';

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
    echo "Connected to MySQL server succesfully! ";
}



if(isset($_POST['submit'])) {
    // echo "Data received";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // CREATE the records inside db
    $insertQuery = "INSERT INTO users(username, password)"; // This is not PHP, but SQL
    $insertQuery .= "VALUES('$user', '$pass')";
    if(!empty($user) && !empty($pass)) {
        mysqli_query($conn, $insertQuery);
    } else {
        echo "Username and password fields can not be blank. ";
    }
}

// Validate form inputs


// Display db content

$displayQuery = "SELECT * FROM users"; //Select everything from users table
?>

<form action="create.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="Submit">
</form>

<?php

$result = mysqli_query($conn, $displayQuery);

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



