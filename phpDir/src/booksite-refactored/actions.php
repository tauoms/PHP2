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

    // If data fields are set, create a new book
    if (isset($_POST['add-book']) && (!empty($_POST['bookid']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['year']) && !empty($_POST['genre']) && !empty($_POST['description']))) {
        // In order to protect against cross-site scripting attacks (i.e. basic PHP security), remove HTML tags from all input.
        $id = strip_tags($_POST['bookid']);
        $title = strip_tags($_POST['title']);
        $author = strip_tags($_POST['author']);
        $year = strip_tags($_POST['year']);
        $genre = strip_tags($_POST['genre']);
        $description = strip_tags($_POST['description']);
        // Prepare an INSERT statement to add a new book to the 'books' table
        $stmt = $conn->prepare("INSERT INTO books (id, title, description, author, publishing_year, genre ) VALUES (?, ?, ?, ?, ?, ?)");
        // Bind the username and password parameters to the prepared statement
        $stmt->bind_param("isssis", $id, $title, $description, $author, $year, $genre);
        // Execute the prepared statement
        $stmt->execute();
        // Close the prepared statement
        $stmt->close();
        $message = "Book added!";

    } elseif (isset($_POST['add-book']) && (empty($_POST['bookid']) || empty($_POST['title']) || empty($_POST['author']) || empty($_POST['year']) || empty($_POST['genre']) || empty($_POST['description']))) {
        $message = "Please fill in all fields.";
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

    // If edit-book is set, update the specified user's information
    if (isset($_POST['edit-book'])) {
        $id = $_POST['bookid'];
        $index = array_search($id, array_column($books, 'id'));
    }
    if (!empty($_POST['bookid']) AND !empty($_POST['title']) AND !empty($_POST['author']) AND !empty($_POST['year']) AND !empty($_POST['genre']) AND !empty($_POST['description'])) {
        // In order to protect against cross-site scripting attacks (i.e. basic PHP security), remove HTML tags from all input.
        $id = strip_tags($_POST['bookid']);
        $title = strip_tags($_POST['title']);
        $author = strip_tags($_POST['author']);
        $year = strip_tags($_POST['year']);
        $genre = strip_tags($_POST['genre']);
        $description = strip_tags($_POST['description']);
        // Prepare an INSERT statement to add a new book to the 'books' table
        $stmt = $conn->prepare("UPDATE books SET title = ?, description = ?, author = ?, publishing_year = ?, genre = ? WHERE id = ?");
        // Bind the username and password parameters to the prepared statement
        $stmt->bind_param("sssisi", $title, $description, $author, $year, $genre, $id);
        // Execute the prepared statement
        $stmt->execute();
        // Close the prepared statement
        $stmt->close();
        $message = "Book edited!";

        // Redirect to admin panel
        header("Location: admin.php");
        exit;

    } elseif (isset($_POST['edit-book']) AND (empty($_POST['bookid']) OR empty($_POST['title']) OR empty($_POST['author']) OR empty($_POST['year']) OR empty($_POST['genre']) OR empty($_POST['description']))) {
        $message = "Please fill in all fields.";
    }

    // Redirect back
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

// // DOES NOT WORK: Restore original books data from backup file
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