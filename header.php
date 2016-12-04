<?php

$htmlHeader = <<<EOF
<!DOCTYPE HTML>
<html>
<head>
<style>
body {
    background: #80b3ff;
    text-align: center;
}
header {
    padding: 10px;
    margin: auto;
    margin-bottom: 10px;
    background: white;
    color: black;
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
    text-shadow: 2px 2px lightgray;
    font-family: sans-serif;
}
footer {
    padding: 2px;
    margin: auto;
    margin-top: 20px;
    font-variant: small-caps;
    color: white;
}

a:link {
    text-decoration: none;
    font-weight: bold;
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
