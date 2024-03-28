<?php
if(isset($_POST['submit'])) {
    echo "Data received";
}
?>

<form action="login.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="Submit">
</form>

