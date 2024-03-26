<?php
$path = 'img/logo.png';

/* Write PHP Code to show file informations of “logo.png” e.g.   
- file name
-file size
-MIME type and 
-Folder
-If no such file exits display “There is no such file”
Note: You can use PHP in-built function e.g. pathinfo, filesize, mime_content_type */



?>

<?php include 'includes/header.php'; ?>
<p>
    <?php
    if (!file_exists($path)) {
        echo "There is no such file";
    } else {
    echo "File name: " . pathinfo($path, PATHINFO_FILENAME) . "<br>" .
    "MIME type: " . mime_content_type($path) . "<br>" .
    "File size: " . number_format(filesize($path)/1000, 2) . " kb <br>" .
    "Folder: " . pathinfo($path, PATHINFO_DIRNAME);
    }
    ?>
</p>
<?php include 'includes/footer.php'; ?>