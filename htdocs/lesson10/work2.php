<?php
	if (isset($_POST['word1']) && isset($_POST['word2']) && isset($_POST['word3'])) {
		$word1 = $_POST['word1'];
		$word2 = $_POST['word2'];
		$word3 = $_POST['word3'];
		$filename = date('YmdHis') . 'json';
		if (($fp = fopen($filename,'wb')) != FALSE) {
			$json = array('word1' => $word1, 'word2' => $word2, 'word3' => $word3);
			fwrite($fp, json_encode($json));
			fclose($fp);
		}
	}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h3>俳句登録</h3>
	<form action="haiku.php" method="POST">
		<input type="text" name="word1" maxlength="5">
		<input type="text" name="word2" maxlength="7">
		<input type="text" name="word3" maxlength="5">
		<button>登録</button>
	</form>
</body>

</html>