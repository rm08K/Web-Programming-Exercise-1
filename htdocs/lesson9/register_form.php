<?php
  // ログインユーザのみがアクセス可能
  session_start();
  if ( !isset($_SESSION['is_logged_in']) ) {
    header('Location: login_form.php');
    exit();
  }

  // CSRF 対策
  $token = bin2hex(random_bytes(32));
  $_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html>
<body>
  <h3>記事登録</h3>
  <form action="register.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?= $token ?>" />
    <div>
      <label>記事タイトル <input type="text" name="title" /></label>
    </div>
    <div>
      <label>ヘッダー画像 <input type="file" name="image" /></label>
    </div>
    <div>
      <label>記事内容 <textarea name="body"></textarea></label>
    </div>
    <div>
      <button>登録</button>
    </div>
  </form>
</body>
</html>
