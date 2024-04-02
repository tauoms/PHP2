<?php include 'db.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Query failed');
}


if (isset($_POST['submit'])) {
  $id = $_POST['id'];

  //Delete the record in db
  // $query = "DELETE FROM users WHERE id = $id";
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
  
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Deletion query failed" . mysqli_error($conn));
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
  <form action="delete.php" method="post">

    <select name="id" id="">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
      }
      ?>
    </select>
    <input type="submit" name="submit" value="DELETE">

  </form>


</body>

</html>