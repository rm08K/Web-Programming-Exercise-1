<?php
    $filename = "fread.php";
    if ( ($f = fopen($filename, 'rb'))) {
        $content = fread($f, filesize($filename));
        fclose($f);

        header('Content-Type: text/plain');
        print($content);
    }