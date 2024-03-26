<?php
/* Write PHP code here 

Step 1: Initialize two variables for password and message. */
$password = '';
$message = '';

/*
Step 2: Write a custom function to check password rules

Step 3: Use if statement to check basic expressions each representing true and false
Take a look, mb_strlen() to check if value contains 8 or more characters
Take a look preg_match, https://www.php.net/manual/en/function.preg-match.php

Hint: /[A-Z]/ checks uppercase characters
/[a-z]/ checks lowercase characters
/[0-9]/ checks numbers 

NOTICE: Does not work with Å Ä Ö */

function checkPassword() {
    global $password;
    if (mb_strlen($password) >= 8 AND 
        preg_match('/[A-Z]/', $password) AND
        preg_match('/[a-z]/', $password) AND
        preg_match('/[0-9]/', $password)
        ) {
            return true;
} else {
    return false;
    }
}

/*
Step 4:  If the form is submitted, password can be collected from $_POST superglobal
*/
$password = $_POST['password'] ?? '';

/*
Step 5: The valid password can be checked by calling custom function 
and the result can be stored in some variable e.g. $valid */
$isValid = false;

if (!empty($_POST['password'])) {
    $isValid = checkPassword();
}

/*
Step 6: Display the results. You may use ternary operator here to check if $valid variable holds true,
If so, $message holds success message otherwise, it holds an error message. 

Step 7: Message can be for example "Password is valid" or if not string
"Password is not strong enough."
*/

$message = $isValid ? "Password is valid." : "Password not strong enough.";

# To not diplay message before form submitted:
if (empty($password)) {
    $message = '';
}

?>
<?php include 'includes/header.php'; ?>

<form action="validate-password.php" method="post">
    <p>Password: <input type="text" name="password"></p>
    <p><input type="submit" value="Submit"></p>
  </form>

  <p>
    <?= $message ?>
  </p>

<?php include 'includes/footer.php'; ?>