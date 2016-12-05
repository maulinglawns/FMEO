<?php

if (! isset($_SESSION)) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');
include "header.php";
include "FMfuncs.php";


$helpText = <<<EOF
<section style="text-align: left;">
<h1>Introduktion:</h1>
<p>FMEditOnline är ett program för redigering av textfiler som exporterats från FileMaker Pro.
De enda filer som stöds är tab-separerade textfiler, alltså filer som har filändelsen <code>'.tab'</code>:</p>
<img src="tab.jpg" />

<h1>Instruktion för export:</h1>
<p>Filen som exporteras ska ska ha följande fält:</p>
<ul style="text-align: left;">
<pre>
<li>Tillfällig numrering/Nummer i katalog*</li>
<li>Allmänt</li>
<li>Särskilt</li>
<li>export 1 (tecknet '@')</li>
<li>Pris</li>
<li>export 2 (tecknet '#')</li>
<li>Kommentar</li>
<em>*Valfritt</em>
</pre>
</ul>

<p>Fälten <code>export 1</code> och <code>export 2</code> måste alltid bestå av 
<code>'@'</code> respektive <code>'#'</code>, annars fungerar inte konverteringen. 
Filen måste också exporteras som <code>UTF-8</code>:</p>
<img src="utf8.jpg" />
<p>Om filen har en annan teckenuppsättning säger programmet ifrån automatiskt.
Den högsta filstorleken är satt till fyra (4) megabyte. Om filen är större säger programmet ifrån.</p>
</section>
EOF;

// Make sure we are logged in
if (! isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != "true") {
    echo "<p>Du har inte behörighet att se den här sidan</p>";
} else {
    echo $helpText;
}


include "footer.php";
?>
