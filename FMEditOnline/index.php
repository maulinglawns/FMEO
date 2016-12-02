<?php

header('Content-type: text/html; charset=utf-8');
include "header.php";
include "FMFuncs.php";

delPrev($uploadDir);

$user = "foo";
$pass = "bar";

$loginForm = <<<EOF
<form method="POST" action="index.php">
Användare:<br /><input type="text" name="user"></input><br/>
Lösenord:<br /><input type="password" name="pass"></input><br/><br/>
<input type="submit" name="submit" value="Skicka"></input>
</form>
EOF;

if (isset($_POST['submit'])) {
    if ($_POST['user'] == $user && $_POST['pass'] == $pass) {
        require_once('../fileHandle.php');
    } else {
        echo "<h1>Fel inloggningsuppgifter!</h1>";
        echo "<p><a href=\"index.php\">Gå tillbaka</a></p>";
    }
} else {
    echo $loginForm;
}

include "footer.php";

?>

