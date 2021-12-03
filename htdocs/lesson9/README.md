時間が余った人は、次のようなプログラムを作ってみてください。
実装サンプルは、4Qでやります。


・ログイン機能
・登録機能
・一覧機能
・詳細機能
・更新機能

をもつWebアプリケーションを作成する。

#### サーバ環境

```
php -S localhost:8080 -t htdocs
```

## ログイン機能 (login_form.php / login.php)

ユーザID: admin、パスワード: password でログインできる。

ログインの仕組みは SESSION を利用する。
php ではセッションの開始は session_start 関数を使う。
ログインが成功したときには session_regenerate_id 関数を使って
セッション固定化攻撃を防止する。
ログインが成功したかどうかがわかるように、セッションに値を持たせる。

## 登録機能 (register_form.php / register.php)

- ログインしたユーザのみが、記事の登録をできる。
- 記事タイトル、ヘッダー画像、記事内容を入力して登録

保存処理は保存形式を考える必要がある。
よく使われる形式は JSON 形式。
画像アップロードが伴う場合、アップロードされた画像のパスも保存しておく必要がある。

ログインが必要な登録系の処理は、CSRF 対策が必要。

## 一覧機能 (index.php)

- 未ログインユーザもアクセス可能
- 登録済みの記事タイトル、登録日時が一覧表示される

出力箇所で XSS 対策をいれること。

## 詳細機能 (show.php)

- 未ログインユーザもアクセス可能
- 記事タイトル、ヘッダー画像、記事内容、登録日時が表示される

表示するデータを特定するためのパラメータの受け渡しを設計する。
通常は、リクエストパラメータを使う。

## 更新機能 (update_form.php / update.php)

- ログインユーザのみ
- 登録済みの記事の、タイトル、ヘッダー画像、記事内容を更新できる

更新対象のデータを特定し、
ファイルに保存する場合は、データを丸ごと上書きする。

