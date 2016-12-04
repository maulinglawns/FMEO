<?php

if (! isset($_SESSION)) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');
include "header.php";
include "FMfuncs.php";

// Clean the directory for up/downloads
delPrev($uploadDir);

session_unset();
session_destroy();

echo "<p>Nu har du loggat ut. Tack och hej!</p>";

include "footer.php";

?>
