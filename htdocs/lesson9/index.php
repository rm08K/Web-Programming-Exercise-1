<!DOCTYPE html>
<html>
<body>
  <h3>記事一覧</h3>

  <?php
    // 記事ファイルの一覧
    $files = glob('data/*.json');
  ?>
  <ul>
  <?php foreach ($files as $file) { ?>
    <?php
      // JSON 形式を PHP 連想配列に変換(json_decode)
      // XSS の対策に htmlspecialchars をつかう
      $filebase = basename($file, '.json');
      $json_str = file_get_contents($file);
      $json = json_decode($json_str, TRUE);
      $title = $json['title'];
      $date = date('Y/m/d H:i:s', $json['date']);
    ?>
    <li>
      <a href="show.php?id=<?= $filebase ?>"><?= htmlspecialchars($title, ENT_QUOTES) ?></a>
      <small><?= htmlspecialchars($date, ENT_QUOTES) ?></small>
      <a href="update_form.php?id=<?= $filebase ?>">更新</a>
    </li>
  <?php } ?>
  </ul>

</body>
</html>
