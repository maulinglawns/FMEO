<?php

$htmlHeader = <<<EOF
<!DOCTYPE HTML>
<html>
<head>
<style>
body {
    background: #f2f2f2;
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
    width: 300px;
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
