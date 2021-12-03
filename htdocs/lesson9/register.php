<?php
  // 登録処理:
  // 登録データをどのような形式で保存するかを考える。
  // 単純なテキスト形式は、人が読む分には良いが、
  // コンピュータが処理するには不便(区切りが分かりづらい)
  // よく使う形式は、JSON 形式。今回は JSON 形式で
  // データを保存する。

  // ログインユーザのみが処理可能
  session_start();
  if ( !isset($_SESSION['is_logged_in']) ) {
    header('Location: login_form.php');
    exit();
  }

  // CSRF 対策
  $token = $_POST['token'];
  if ($_SESSION['token'] != $token) {
    echo '予期せぬリクエストです。';
    include_once('register_form.php');
    exit();
  }

  // 登録処理
  $title = $_POST['title'];
  $body = $_POST['body'];
  $image = $_FILES['image'];

  // data フォルダにファイルを保存する。
  // ※実際には Web からアクセスできない場所にデータは保存するべき
  // Web からアクセスできない場所というのは、htdocs 配下以外の箇所

  // JSON 形式でデータを保存する
  // ファイル名は保存日時を使う
  $filebase = date('YmdHis');
  $filename = "data/${filebase}.json";
  $img_path = "data/${filebase}";

  // 画像は、バイナリの保存場所のパスをファイルに書いておく。
  move_uploaded_file($image['tmp_name'], $img_path);
  $json = ["title" => $title,
           "body" => $body,
           "image" => $img_path,
           "date" => time()];
  if ( ($fp = fopen($filename, 'wb')) != FALSE ) {
    fwrite($fp, json_encode($json));
    fclose($fp);
  }

  header("Location: register_form.php");
