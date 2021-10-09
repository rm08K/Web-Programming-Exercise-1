<?php
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $total = 1;
    for ($i = 0; $i < $num2; $i++) {
        $total = $total * $num1;
    }
    echo $total;