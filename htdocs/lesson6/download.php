<?php
    $file = '1*1.png';
    header('Content-Disposition: inline; filename=sample.png');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    readfile($file);