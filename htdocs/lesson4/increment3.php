<?php
// 例3 セッションを使った実装

session_start();
if (isset($_SESSION['number'])) {
    $current_number = $_SESSION['number'];
} else {
    $current_number = 0;
}
$current_number = $current_number + 1;
$_SESSION['number'] = $current_number;
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
    <a href="increment3.php">増やす</a>
</body>
</html>