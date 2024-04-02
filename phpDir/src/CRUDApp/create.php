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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUDApp</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h1>User Management</h1>
        <div class="login">
            <form action="create.php" method="post">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
                <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>

<?php

$result = mysqli_query($conn, $displayQuery);

if (!$result) {
    die('Reading db records failed');
}
?>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
<?php
// READ rows from db
while ($row = mysqli_fetch_assoc($result)) { // Fetch arrays from db
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['password'] ?></td>
        <td>actions here</td>
    </tr>
    <?php
}
?>
</table>


