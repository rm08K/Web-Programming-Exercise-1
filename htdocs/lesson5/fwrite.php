<?php
    //書き込みの例

$filename = date('YmdHis') . '.txt';
if ( ($f = fopen($filename, 'wb'))) {
    fwrite($f, "Hello");
    // fwrite($f, PHP_EOL); もしくは"¥n"でもOK
    fwrite($f,"¥n");
    fwrite($f,"World");
    fclose($f);
}