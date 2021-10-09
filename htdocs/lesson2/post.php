<?php
    // $_POST を使ったリクエストパラメータの受け取り方
    // POSTはformタグを使ったリクエストパラメータを受け取る際に使う
    // <form action="post.php" method="POST">
    // <input type="text"
    // </form>

    // echo $_POST["name"]

    $sei = $_POST["sei"];
    $mei = $_POST["mei"];
    
    if ($sei == "yamada" || $mei == "yamada") {
        echo "xxxx";
    } else {
        echo $sei . " " . $mei;
    }
    
    // 文字列演算子：ピリオドでくっつけます。