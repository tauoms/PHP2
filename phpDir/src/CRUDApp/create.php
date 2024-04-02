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
} 
// else {
//     echo "Connected to MySQL server succesfully! ";
// }



if(isset($_POST['submit'])) {
    // echo "Data received";
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // CREATE the records inside db
    // $insertQuery = "INSERT INTO users(username, password)"; // This is not PHP, but SQL
    // $insertQuery .= "VALUES('$user', '$pass')";
    // mysqli_query($conn, $insertQuery);

    if(!empty($user) && !empty($pass)) {
        // Prepare INSERT statement with placeholders
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        // Bind the variables to the prepared statement as strings
        $stmt->bind_param("ss", $user, $pass);
        // Execute the prepared statement and check the result

        if ($stmt->execute()) {
            // Redirect to the same page to prevent form resubmission
            header("Location: " . $_SERVER["PHP_SELF"]);
    
            exit; // Make sure to stop the script execution after the redirect
    
        } else {
            // Handle errors during execution
            die('Query insertion failed');
        }
        // Close the prepared statement
        $stmt->close();

    } else {
        echo "Username and password fields can not be blank. ";
    }
}


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



