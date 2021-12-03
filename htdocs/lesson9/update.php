<?php
  // 更新機能:
  // 更新対象のデータを特定し、データを上書き保存する。
  // ファイルの場合、一部分のみ書き換えるというのはできないので、
  // ファイルの中身をまるごと書き換えることになる。
  // データベース等の専用の保存システムの場合、特定の情報のみを書き換えることができる

  // ログインチェック
  session_start();
  if ( !isset($_SESSION['is_logged_in']) ) {
    header('Location: login_form.php');
    exit();
  }

  // CSRF 対策
  $token = $_POST['token'];
  if ($token != $_SESSION['token']) {
    header('Location: index.php');
    exit();
  }

  if ( !isset($_POST['id']) ) {
    echo '更新対象のデータが見つかりません。';
    http_response_code(404);
    exit();
  }

  $filebase = basename($_POST['id'], '.json');
  $filename = "data/${filebase}.json";
  if ( !file_exists($filename) ) {
    echo '更新対象のデータが見つかりません。';
    http_response_code(404);
    exit();
  }

  $json_str = file_get_contents($filename);
  $json = json_decode($json_str, TRUE);

  // データ上書き
  $json['title'] = $_POST['title'];
  $json['body'] = $_POST['body'];
  $image_path = "data/${filebase}";
  move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

  if ( ($fp = fopen($filename, 'wb')) != FALSE ) {
    fwrite($fp, json_encode($json));
    fclose($fp);
  }

  header('Location: index.php');
