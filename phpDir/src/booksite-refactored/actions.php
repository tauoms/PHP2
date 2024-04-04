<?php
/*
Site actions using repared statements.
*/

// Start or resume a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check user is logged in
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Include the database connection file
require_once 'db.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// If username and password are set, create a new user
if (isset($_POST["username"]) && isset($_POST["password"])) {
// Prepare an INSERT statement to add a new user to the 'users' table
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
// Bind the username and password parameters to the prepared statement
$stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
// Execute the prepared statement
$stmt->execute();
// Close the prepared statement
$stmt->close();
}

// If deletebook is set, delete the specified user
if (isset($_POST["deletebook"])) {
// Prepare a DELETE statement to remove a user from the 'users' table
$stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
// Bind the delete_id parameter to the prepared statement
$stmt->bind_param("i", $_POST["bookid"]);
// Execute the prepared statement
$stmt->execute();
// Close the prepared statement
$stmt->close();
}

// If edit_id is set, update the specified user's information
if (isset($_POST["edit_id"])) {
// Prepare an UPDATE statement to modify a book's information in the 'books' table
$stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
// Bind the edit_username, edit_password, and edit_id parameters to the prepared statement
$stmt->bind_param("ssi", $_POST["edit_username"], $_POST["edit_password"], $_POST["edit_id"]);
// Execute the prepared statement
$stmt->execute();
// Close the prepared statement
$stmt->close();
}

// Redirect back
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}

// // Restore original books data from backup file
// if (isset($_POST['restorebackup'])) {
//     $backupFile = 'books.sql';

//     $loadDataSql = "LOAD DATA INFILE $backupFile INTO TABLE books";

//     $loadBackupResult = $conn->query($loadDataSql);

//     // Check if the command executed successfully
//     if ($loadBackupResult === TRUE) {
//         $_SESSION["restoremessage"] = "Backup restored!";
//     } else {
//         // Handle error
//         echo "Error: " . $conn->error;
//     }
//     }





?>