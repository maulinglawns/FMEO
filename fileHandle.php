<?php

if (! isset($_SESSION)) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');
include "header.php";

// Make sure we are logged in
if (! isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != "true") {
    echo "<p>Du har inte behörighet att se den här sidan</p>";
}

$fileForm = <<<EOF
<form enctype="multipart/form-data" action="fileHandle.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
    Klicka på knappen 'Bläddra' för att välja fil:<br /><input name="fmfile" type="file" />
    <br />
    <input type="submit" name="upload" value="Skicka fil" />
</form>
EOF;

$uploadOk = False;
$encOk = False;
$fileNameOk = True;
$localFile = "";
$fileName = "";

// Specify the save location for our uploads below
// Remember to set the _right_ path and write permissions!
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/FMEditOnline/uploads/";
// Need to creat a proper download link that the browser understands
$downloadDir = "/FMEditOnline/uploads/";

// Only run the code below if we are logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
    // Show upload option ($fileForm) if button not clicked
    if (! isset($_POST['upload'])) {
        echo $fileForm;
        } else {
            echo "<section>";
            // Get the filename and extension of uploaded file
            $fileName = basename(($_FILES['fmfile']['name']));
            $uploadFile = $uploadDir . $fileName; // Full path to uploaded file
            // Get extension of uploaded file
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        
            // Check if filename is empty
            if (empty($fileName)) {
                $fileNameOk = False;
                echo "<p style=\"color: red;\">Du har inte valt någon fil att ladda upp.</p>";
                echo $fileForm;
            // If the filename is not empty, do we have the right extension?
            } elseif ($fileExt != "tab") {
                $fileNameOk = False;
                echo "<p style=\"color: red;\">Du har laddat upp fel filtyp (ska vara '.tab').</p>";
                echo $fileForm;
            // If filename is ok, and have the right extension
            } elseif ($fileNameOk) {
                // Is the file UTF-8?
                if (! mb_check_encoding(file_get_contents($_FILES['fmfile']['tmp_name']), 'UTF-8')) {
                    echo "<p style=\"color: red;\">Filen har fel teckenkodning (inte UTF-8). Avbryter.</p>";
                    echo $fileForm;
                } else {
                    $encOk = True;
                    if (move_uploaded_file($_FILES['fmfile']['tmp_name'], $uploadFile)) {
                        $uploadOk = True;
                    } else {
                        echo "<p style=\"color: red;\">Oops! Något gick fel. Prova att ladda upp filen igen.</p>";
                        echo $fileForm;
                }
            }
        }
    }
    
    if ($uploadOk && $encOk) {
        // Save the edited file with '.txt' extension in upload dir
        $newFile = $uploadDir . pathinfo($fileName, PATHINFO_FILENAME) . ".txt";
        
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
        
        // Try to write this to file
        if (file_put_contents($newFile, $localFile)) {
            echo "<p>Filen är redigerad och färdig för nedladdning!</p>";
        } else {
            echo "<p>Oops! Något gick fel när filen skulle sparas.</p>";
        }
        
        // If the new (edited) file exists, make a download link
        if (file_exists($newFile)) {
            echo "<h2>Klicka " . "<a download href=\"" . $downloadDir . 
            basename($newFile) . "\">HÄR</a>" . " för att ladda ned filen</h2>";
            echo "<p>Klicka <a href=\"\">här</a> för att ladda upp en ny fil.</p>";
            echo "<p>När du är färdig, glöm inte att <strong>logga ut</strong></p>";
            echo "</section>";
        }
    }

}

include "footer.php";

?>
