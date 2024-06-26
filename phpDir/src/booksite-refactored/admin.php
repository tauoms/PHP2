<?php include 'actions.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // $restoremessage = '';
    
    $message = '';
    // Bind session message (deleted) to $message
    if (!empty($_SESSION['message'])) {
        $message = $_SESSION['message'] ?? '';
        $_SESSION['message'] = '';
    }

    // If the user is not logged in, redirect them back to login.php.
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    // if(!empty($_SESSION["restoremessage"])){
    //     $restoremessage = $_SESSION["restoremessage"];
    //     $_SESSION["restoremessage"] = '';
    // }

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
            <h2>All Books</h2>
            <!-- <form class="restorebackup" action="actions.php" method="post">
                    <input type="submit" name="restorebackup" value="Restore Backup">

                </form>
                <p class="restoremessage">(Revert back to original book list)</p>
                    <br> -->
            <p class="message"><?= $message ?></p>

            <?php
                // This is almost identical to booksite.php (minus the genres). Make sure to print the correct id to the delete form.
                foreach ($books as $book) {
                    $id = $book['id'];
                    $title = $book["title"];
                    $author = $book["author"];
                    $publishing_year = $book["publishing_year"];
                    $description = $book["description"]; ?>
                    <section class="book">
                    
                    <form class="deleteform" action="actions.php" method="post">
                    <input type="hidden" name="bookid" value="<?= $id; ?>">
                    <input type="submit" name="deletebook" value="Delete" onClick="return confirm(`Are you sure you want to delete <?= $title ?> ?`)">
                    </form>

                    <form class="editform" action="editbook.php?id=<?= $id ?>" method="post">
                    <input type="hidden" name="to-edit-id" value="<?= $id; ?>">
                    <input type="submit" name="editbook" value="Edit">
                    </form>
            <h3><?php print $title; ?></h3>
            <p class="publishing-info">
                <span class="author"><?= $author; ?></span>,
                <span class="year"><?= print $publishing_year; ?></span>
            </p>
            <p class="description">
                <?= $description; ?>
            </p>
        </section>

            <?php } 
            
            ?>
            
        </main>
    </div>    
</body>
</html>