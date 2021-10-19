<?php
// hiddenとリクエストパラメータ
// ?number の部分がリクエストパラメータだよん
    if (isset($_GET['number'])) {
        $current_number = $_GET['number'];
    } else {
        $current_number = 0;
    }
    $current_number = $current_number + 1;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>現在のアクセス数は： <?= $current_number ?></h3>
    <p><label>リンクタグで増加させる方法</label>
    <a href="increment1.php?number=<?= $current_number ?>">増やす</a></p>

    <p><label>フォームタグで増加させる方法</label>
    <form action="increment1.php" method="GET">
        <input type="hidden" name="number" value="<?= $current_number ?>" />
        <button>増やす</button>
    </form></p>
</body>
<!-- メモ
＝が足りないとエラーを吐いたり、まともに動かない
リクエストパラメータが狂っているように見えた時があるので、URLを見てみよう
 -->
</html>