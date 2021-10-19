<?php
// 実装例2：Cookie

if (isset($_COOKIE['number'])) {
    $current_number = $_COOKIE['number'];
} else {
    $current_number = 0;
}
$current_number = $current_number + 1;
setcookie('number', $current_number);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>現在のアクセス回数： <?= $current_number ?></h3>
    <a href="increment2.php">増やす</a>
</body>
</html>