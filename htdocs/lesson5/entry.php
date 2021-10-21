<?php

function redirect_to($filename) {
    $host = $_SERVER['HTTP_HOST'];
    $dir = rtrim(dirname($_SERVER['PHP_SELF']),'/¥¥');

    header('HTTP/1.1 201 Created');
    header("Location:http://${host}${dir}/${filename}");
}

$title = $_POST['title'];
$body = $_POST['body'];

redirect_to('lesson5/created.html');
exit();
// echo "<h1>${title}</h1>";
// echo "<p>${body}</p>";