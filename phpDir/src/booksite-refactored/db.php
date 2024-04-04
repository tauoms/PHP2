<?php
$host = 'db';
// Database user name
$dbname = 'booksite';
$user = 'root';
//database user password
$pass = 'lionPass';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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