<?php
  // ログインとは:
  // (1)リクエストパラメータのログインIDとパスワードを使って
  // ユーザが存在するかどうかを調べ、存在していることを
  // 確認すること。
  // (2)存在していればセッションを作成し、
  // その後ログインID/パスワードの送信がなくても
  // 同一ユーザからの接続とみなすこと。

  session_start();

  // (1) ユーザの存在確認
  // 今回は、admin/password の組み合わせで存在していることにする
  // 実際には、ユーザを管理するファイルやデータベースから
  // ログインID/パスワードの組み合わせのユーザが存在するかを
  // 確認する処理になる。
  $login_id = $_POST['login_id'];
  $password = $_POST['password'];
  if ($login_id == 'admin' && $password == 'password') {
    // ユーザが存在したので、
    // セッションにログイン済みであることを示すデータを入れておく
    // このデータが有ることで"ログイン済み"とみなす
    session_regenerate_id();
    $_SESSION['is_logged_in'] = TRUE;

    // ログイン処理が終わったので index.php に飛ばす
    header("Location: index.php");
  } else {
    // ログイン失敗
    echo 'ログインID、またはパスワードが一致しません。';
    include_once('login_form.php');
  }


