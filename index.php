<?php

if (! isset($_SESSION)) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');
include "header.php";
include "FMfuncs.php";

// Clean the directory for up/downloads
delPrev($uploadDir);

$user = "foo";
$pass = "bar";
$limit = 2;

$loginForm = <<<EOF
<form method="POST" action="index.php">
Användare:<br /><input type="text" name="user"><br/>
Lösenord:<br /><input type="password" name="pass"><br/><br/>
<input type="submit" name="submit" value="Skicka">
</form>
EOF;

// Initialize the loggedin session var
if (! isset($_SESSION['loggedin']))  {
    $_SESSION['loggedin'] = "false";
}

// Initialize the failed login var
if (! isset($_SESSION['failed'])) {
    $_SESSION['failed'] = 0;
}

// Redirect after more than $limit attempts at logging in
if ($_SESSION['failed'] > 2) {
    header('Location: notWelcome.php');
    /*  todo: Replace the above with proper error page */
}   

if ($_SESSION['loggedin'] != "true") {
    if (isset($_POST['submit'])) {
        if ($_POST['user'] == $user && $_POST['pass'] == $pass) {
            $_SESSION['loggedin'] = "true";
            // Reset the failed login counter
            $_SESSION['failed'] = 0;
            echo "<p>Du är inloggad.</p>";
            echo "<p>Klicka <a href=\"fileHandle.php\">här</a> för att gå vidare.</p>";
        } else {
            $_SESSION['failed']++;
            echo "<h1>Fel inloggningsuppgifter!</h1>";
            echo "<p><a href=\"index.php\">Gå tillbaka</a></p>";
        }
    } else {
        echo $loginForm;
    }
} else {
    echo "<p>Du är inloggad.</p>";
    echo "<p>Klicka <a href=\"fileHandle.php\">här</a> för att gå vidare.</p>";
}

include "footer.php";

?>

