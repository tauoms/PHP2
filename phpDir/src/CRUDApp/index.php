<?php 
include 'create.php';

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
        <div>
            <form action="index.php" method="post">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
                <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
                <br>
                <input type="submit"  name="createuser" value="Submit">
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
// Display db content
$displayQuery = "SELECT * FROM users"; //Select everything from users table
$result = mysqli_query($conn, $displayQuery);

if (!$result) {
    die('Reading db records failed');
}
// READ rows from db
while ($row = mysqli_fetch_assoc($result)) { // Fetch arrays from db
?>
        <tr data-id="<?= $row['id'] ?>">
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td>••••••••</td>
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