<?php include 'db.php';

    // If the user is not logged in, redirect them back to login.php.
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $id = $_POST['to-edit-id'] ?? $_GET['id'];
    $index = array_search($id, array_column($books, 'id'));
    $message = $_SESSION['message'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="booksite.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="container">
        <header>
        <h1>PHP Booksite</h1>
        </header>
        <nav id="main-navi">
        <ul>
                <li><a href="admin.php">Admin Home</a></li>
                <li><a href="addbook.php">Add a New Book</a></li>
                <li><a href="login.php?logout">Log Out</a></li>
            </ul>
        </nav>
        <main>
            <h2>Edit Book</h2>
            <form action="actions.php" method="post">
                <p>
                    <label for="bookid">ID:</label>
                    <input type="number" id="bookid" name="bookid" value="<?php print $books[$index]['id'] ?>" >
                </p>
                <p>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php print $books[$index]['title'] ?>" >
                </p>
                <p>
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" value="<?php print $books[$index]['author'] ?>" >
                </p>
                <p>
                    <label for="year">Year:</label>
                    <input type="number" id="year" name="year" value="<?php print $books[$index]['publishing_year'] ?>" >
                </p>
                <p>
                    <label for="genre">Genre:</label>
                    <?php $default_state = $books[$index]['genre'];?>
                    <select id="genre" name="genre">
    <option value='<?php echo $default_state?>' selected='selected'><?php echo $default_state?></option>
                        <option value="Adventure">Adventure</option>
                        <option value="Classic Literature">Classic Literature</option>
                        <option value="Coming-of-age">Coming-of-age</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Historical Fiction">Historical Fiction</option>
                        <option value="Horror">Horror</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Romance">Romance</option>
                        <option value="Science Fiction">Science Fiction</option>
                    </select>
                </p>
                <br>
                <p>
                    <label for="description">Description:</label><br>
                    <textarea rows="5" cols="100" id="description" name="description"><?php print $books[$index]['description'] ?></textarea>
                </p>
                <p><input type="submit" name="edit-book" value="Edit Book"></p>
            </form>
            <p class="message"><?php print $message ?></p>
        </main>
    </div>    
</body>
</html>