<?php
  // 更新機能:
  // 更新対象のデータをどのように特定するか。
  // 詳細機能と同じように、リクエストパラメータを使うのが普通。

  // ログインチェック
  session_start();
  if ( !isset($_SESSION['is_logged_in']) ) {
    header('Location: login_form.php');
    exit();
  }

  // CSRF 対策
  $token = bin2hex(random_bytes(32));
  $_SESSION['token'] = $token;

  // 更新データ
  $filebase = basename($_GET['id'], '.json');
  $filename = "data/${filebase}.json";
  if ( !file_exists($filename) ) {
    echo '更新データが見つかりません。';
    http_response_code(404);
    exit();
  }

  $json_str = file_get_contents($filename);
  $json = json_decode($json_str, TRUE);
  $title = $json['title'];
  $body = $json['body'];
  $image_url = $json['image'];
?>
<!DOCTYPE html>
<html>
<body>
  <h3>データ更新</h3>
  <form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?= $token ?>" />
    <input type="hidden" name="id" value="<?= $filebase ?>" />
    <div>
      <div><label>タイトル <input type="text" name="title" value="<?= htmlspecialchars($title, ENT_QUOTES) ?>" /></label></div>
      <div><label>ヘッダー画像 <input type="file" name="image" /> <br />
        <img src="<?= $image_url ?>" style="width: 256px" />
      </label></div>
      <div><label>内容 <textarea name="body"><?= htmlspecialchars($body, ENT_QUOTES) ?></textarea></label></div>
      <div><button>更新</button></div>
  </form>
</body>
</html>
