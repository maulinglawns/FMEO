<?php

// Specify the save location for our uploads below
// Remember to set the _right_ path and write permissions!
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/FMEditOnline/uploads/";


function delPrev($path)
{
    // Delete previous uploads
    $prevFiles = glob("$path*");
    if (! empty($prevFiles)) {
        foreach($prevFiles as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }
    }
}

?>
