<form action="entry.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>記事</legend>
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" class="input-block-level">
        <label for="body">内容</label>
        <textarea name="body" id="body" rows="10" class="input-block-level"></textarea>
        <label for="attachment">添付ファイル</label>
        <input type="file" name="attachment" id="attachment" />
        <input type="hidden" name="_token" value="<?php echo $_SESSION['token']; ?>" />
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">投稿</button>
        </div>
    </fieldset>
</form>