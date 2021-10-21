<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="lesson5/entry.php" method="POST">
        <fieldset>
            <legend>記事</legend>
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="input-block-level">
            <label for="body">内容</label>
            <textarea name="body" id="body" rows="10" class="input-block-level"></textarea>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">投稿</button>
            </div>
        </fieldset>
    </form>
</body>
</html>