<?php include 'db.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Query failed');
}

if (isset($_POST['submit'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $id = $_POST['id'];

  //Update the records in db
  // $query = "UPDATE users SET ";
  // $query .= "username = '$user', ";
  // $query .= "password = '$pass' ";
  // $query .= "WHERE id = $id";

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


  // $result = mysqli_query($conn, $query);
  // if (!$result) {
  //   die("Update query failed" . mysqli_error($conn));
  // } 

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP CRUD App</title>
</head>

<body>
  <form action="update.php" method="post">

    <label for="username"> Username </label>
    <input type="text" name="username">
    <label for="password"> Password </label>
    <input type="password" name="password">
    <select name="id" id="">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
      }
      ?>
    </select>
    <input type="submit" name="submit" value="UPDATE">

  </form>


</body>

</html>