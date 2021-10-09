<?php
    $num1 = $_POST["num1"];
    $sym = $_POST["sym"];
    $num2 = $_POST["num2"];
    
    if($sym == "+") {
        echo $num1 + $num2;
    } else if ($sym == "-") {
        echo $num1 - $num2;
    } else {
        echo "error";
    }