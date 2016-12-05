<?php

$htmlHeader = <<<EOF
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css"
href="https://fonts.googleapis.com/css?family=Roboto">
<style>
body {
    font-family: Roboto, sans-serif;
    background: #80b3ff;
    text-align: center;
}
header {
    padding: 10px;
    margin: auto;
    margin-bottom: 10px;
    background: white;
    color: #0066ff;
}
form {
    width: 400px;
    margin: auto;
    text-align: left;
}
section {
    width: 500px;
    margin: auto;
}
h1 {
    text-shadow: 2px 2px #cce0ff;
}
footer {
    padding: 2px;
    margin: auto;
    margin-top: 20px;
    font-variant: small-caps;
}

a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}


footer a {
    color: white;
}
</style>
</head>
<body>
<header>
<h1>FMEditOnline</h1>
<p>Ett textkonverteringsverktyg av Magnus Wallin</p>
</header>
EOF;

echo $htmlHeader;

?>
