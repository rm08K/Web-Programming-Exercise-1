<?php
  // 詳細機能:
  // 詳細画面で表示するデータをどのように決めるかがポイント
  // 通常は、リクエストパラメータを使って表示データを指定する。
  // 今回であれば、ファイル名の一部をリクエストパラメータに使い
  // そのデータを画面に表示する形にする。
  // ファイルのパスをそのまま処理してしまうと、
  // ディレクトリトラバーサルの脆弱性を埋め込んでしまうので注意

  // リクエストパラメータ名は id にする
  if ( !isset($_GET['id']) ) {
    header('Location: index.php');
    exit();
  }

  $filebase = basename($_GET['id'], '.json');
  $filename = "data/${filebase}.json";
  if ( !file_exists($filename) ) {
    echo 'データが見つかりません。';
    http_response_code(404);
    exit();
  }

  $json_str = file_get_contents($filename);
  $json = json_decode($json_str, TRUE);
  $title = $json['title'];
  $body = $json['body'];
  $image_url = $json['image'];
  $date = date('Y/m/d H:i:s', $json['date']);
?>
<!DOCTYPE html>
<html>
  <body>
    <h3><?= htmlspecialchars($title) ?></h3>
    <div>
      <img src="<?= $image_url ?>" style="width: 256px" /><br />
      <p><?= htmlspecialchars($body) ?></p>
      <small><?= $date ?></small>
    </div>
    <a href="index.php">戻る</a>
  </body>
</html>
