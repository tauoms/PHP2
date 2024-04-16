<?php
/*

Step 1: Store the value sent for a cookie for color
(or null if it was not sent) */

if (isset($_POST['color'])) {
  $colorScheme = $_POST['color'];
} else {
  $colorScheme = null;
};

/* Step 2: Create an array to hold permitted options e.g. light, dark */

$permittedOptions = ['light', 'dark'];

/* Step 3: Check if the form has been submitted. You may use $_SERVER['REQUEST_METHOD] */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
/* Step 4: Now use setcookie() function to set a cookie on color variable. Its value is the option
that user selected from the select box. It also:
  - expires in one hour
  - is sent to all pages of the site
  - Gets sent via HTTP or HTTPS
  - is hidden from JavaScript */
  setcookie('colorScheme', $colorScheme, time() + 3600, "/");
};

/* Step 5: You may now use ternary to check if the value in color is in the options array. 
If it is, the value should be saved to some other variable and it not, store the value of 'dark'. */
$checkedColor = in_array($_COOKIE['colorScheme'], $permittedOptions) ? $_COOKIE['colorScheme'] : 'dark';
?>

<?php include 'includes/header-style-switcher.php'; ?>
<form method="POST" action="cookie-preferences.php">
  Select color scheme:
  <select name="color">
    <option value="dark">Dark</option>
    <option value="light">Light</option>
  </select><br>
  <input type="submit" value="Save">
</form>
<?= "Selected colorScheme: $checkedColor" ?>
<?php include 'includes/footer.php'; ?>