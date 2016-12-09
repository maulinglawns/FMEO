<?php

if (! isset($_SESSION)) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');
include "header.php";
?>

<h1>För många felaktiga inloggningsförsök!</h1>

<?php
include "footer.php";

?>
