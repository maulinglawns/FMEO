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

if ($_SESSION['loggedin'] != "true") {
    if (isset($_POST['submit'])) {
        if ($_POST['user'] == $user && $_POST['pass'] == $pass) {
            $_SESSION['loggedin'] = "true";
            echo "<p>Du är inloggad.</p>";
            echo "<p>Klicka <a href=\"fileHandle.php\">här</a> för att gå vidare.</p>";
        } else {
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

