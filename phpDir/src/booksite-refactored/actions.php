<?php
/*
Site actions using repared statements.
*/

// Start or resume a session
// session_start();

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
// Prepare an UPDATE statement to modify a user's information in the 'users' table
$stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
// Bind the edit_username, edit_password, and edit_id parameters to the prepared statement
$stmt->bind_param("ssi", $_POST["edit_username"], $_POST["edit_password"], $_POST["edit_id"]);
// Execute the prepared statement
$stmt->execute();
// Close the prepared statement
$stmt->close();
}

// Redirect to the same page to prevent form resubmission on page refresh
header("Location: " . 'admin.php');
exit;
}

// Retrieve all books from the 'books' table
$result = $conn->query("SELECT * FROM books");

// Initialize an array to hold the books data
$books = array();
// Fetch each row of user data and add it to the $rows array
while ($book = $result->fetch_assoc()) {
$books[] = $book;
}
?>