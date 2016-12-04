<?php

$htmlFooter = <<<EOF
<footer>
<p><a href=index.php>hem</a></p>
</footer>
</body>
</html>
EOF;

$htmlFooterLogin = <<<EOF
<footer>
<p><a href=index.php>hem</a> | <a href=fileHandle.php>ladda upp fil</a> | 
<a href=logout.php>logga ut</a></p>
</footer>
</body>
</html>
EOF;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
    echo $htmlFooterLogin;
} else {
    echo $htmlFooter;
}

?>
