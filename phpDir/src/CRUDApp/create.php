<?php include 'db.php';

session_start();

// CREATE record
if(isset($_POST['createuser'])) {
    // echo "Data received";
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // CREATE the records inside db
    // $insertQuery = "INSERT INTO users(username, password)"; // This is not PHP, but SQL
    // $insertQuery .= "VALUES('$user', '$pass')";
    // mysqli_query($conn, $insertQuery);

    if(!empty($user) && !empty($pass)) {
        // Create hashed password
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        // Prepare INSERT statement with placeholders
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        // Bind the variables to the prepared statement as strings
        $stmt->bind_param("ss", $user, $hashedPass);
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

// DELETE record
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


?>

