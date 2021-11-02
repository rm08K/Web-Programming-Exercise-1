<?php
    if(isset($_FILES['sample'])){
        $file = $_FILES['sample'];
        var_dump($file);

        move_uploaded_file($file['tmp_name'], $file['name']);
    }