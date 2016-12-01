<?php

header('Content-type: text/html; charset=utf-8');

$fileForm = <<<EOF
<form enctype="multipart/form-data" action="../fileHandle.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    Ladda upp den här filen: <input name="fmfile" type="file" />
    <input type="submit" name="upload" value="Skicka fil" />
</form>
EOF;

$uploadOk = False;
$localFile = "";
$fileName = "";

// Specify the save location for our uploads below
// Remember to set the _right_ path and write permissions!
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/FMEditOnline/uploads/";


if (! isset($_POST['upload'])) {
    echo $fileForm;
} else {
    include "FMEditOnline/header.php"; // echo header again
    // Get the filename and extension of uploaded file
    $fileName = basename(($_FILES['fmfile']['name']));
    $uploadFile = $uploadDir . $fileName; // Full path to ulpoaded file

    if (move_uploaded_file($_FILES['fmfile']['tmp_name'], $uploadFile)) {
        echo "<p>Filen är uppladdad!</p>";
        $uploadOk = True;
    } else {
        echo "<p>Oops! Något gick fel. Prova att ladda upp filen igen.</p>";
    }
}

if ($uploadOk) {
    // Save the edited file with '.txt' extension in upload dir
    $newFile = $uploadDir . pathinfo($fileName, PATHINFO_FILENAME) . ".txt";
    
    echo "<p>Påbörjar bearbetning av filen...</p>";
    // Read uploaded file into var
    $localFile = file_get_contents($uploadFile);
    // Remove all tabs from string
    $localFile = preg_replace("/\t/", "", $localFile);
    // Replace all Windows line breaks with Unix
    $localFile = preg_replace("/\r/", "\n\n", $localFile);
    // Replace all '#' with '\n'
    $localFile = preg_replace("/#/", "\n", $localFile);
    // Replace all '@' with '\t'
    $localFile = preg_replace("/@/", "\t", $localFile);
    // Replace 3 line breaks with 2
    $localFile = preg_replace("/\n\n\n/", "\n\n", $localFile); 
    //echo $localFile;
    
    // Try to write this to file
    if (file_put_contents($newFile, $localFile)) {
        echo "<p>Filen är redigerad och färdig för nedladdning!</p>";
    }
}

?>
