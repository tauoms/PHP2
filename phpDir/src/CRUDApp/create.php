<?php include 'db.php';

// $user = '';
// $pass = '';

// CREATE record
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

// Delete record
if(isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

  $stmt = $conn->prepare("DELETE FROM users WHERE id= ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
  } else {
    // Handle errors during execution
    die('Query deleting failed');
}
// Close the prepared statement
$stmt->close();
  
}

// UPDATE / EDIT record:
if (isset($_POST['edit_id'])) {
    $user = $_POST['edit_username'];
    $pass = $_POST['edit_password'];
    $id = $_POST['edit_id'];
  
    if(!empty($user) && !empty($pass)) {
      // Prepare INSERT statement with placeholders
      $stmt = $conn->prepare("UPDATE users SET username=?, password=? WHERE id=?");
      ;
      // Bind the variables to the prepared statement as strings
      $stmt->bind_param("ssi", $user, $pass, $id);
      // Execute the prepared statement and check the result
  
      if ($stmt->execute()) {
          // Redirect to the same page to prevent form resubmission
          header("Location: " . $_SERVER["PHP_SELF"]);
  
          exit; // Make sure to stop the script execution after the redirect
  
      } else {
          // Handle errors during execution
          die('Query updating failed');
      }
      // Close the prepared statement
      $stmt->close();
    }
}
// Display db content

$displayQuery = "SELECT * FROM users"; //Select everything from users table
$result = mysqli_query($conn, $displayQuery);

if (!$result) {
    die('Reading db records failed');
}
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
        <tr data-id="<?= $row['id'] ?>">
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><button onclick="toggleEditMode(this.parentNode.parentNode, true)">Edit</button><button onclick="deleteRow(<?= $row['id'] ?>)">Delete</button></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
