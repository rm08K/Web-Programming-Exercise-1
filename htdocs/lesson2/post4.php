<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form   form action="http://localhost:8080/lesson2/post5.php" method="POST">
        <input type="text" name="sports" placeholder="好きなスポーツを入力してね" />
        <input type="hidden" name="food" value="<?php echo $_POST["food"] ?>" />
        <button>送信</button>
    </form>
</body>
</html>

    