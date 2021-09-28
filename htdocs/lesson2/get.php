<?php
    // URLに付与されたリクエストパラメータを受け取る例
    // PHPにはリクエストパラメータを受け取る変数が２つある
    // $_GET / $_POST

    // $_GET
    // GET リクエストでのパラメータを受け取るための変数
    // URLに付与されたリクエストパラメータを受け取る
    // 例： http://localhost:8080/lesson2/get.php?name=yamada
    // echo $_GET["name"]

    $name = $_GET["name"];
    echo $name;