<?php
	function mapping($c) {
		$dict = array('a' => 'z', 'b' => 'y', 'c' => 'x', 'p' => 't', 'q' => 'g', 'r' => 'b');
		if (isset($dict[$c])) {
			return $dict[$c];
		} else {
			return $c;
		}
	}

	$ret = '';
	if (isset($_POST['word'])) {
		$word = $_POST['word'];
		$chars = str_split($word);

		// 繰り返し構文を使って実装
		// $ret = '';
		// for ($i = 0; $i < length($charts); $i++) {
		// 	$ret += mapping($chars[$i]);
		// }

		$ret = implode('', array_map('mapping', $chars));
	}

	// $json = array('result' => $ret)
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h3>変換プログラム</h3>
	<form action="work1.php" method="POST">
		<input type="text" name="word">
		<button>変換</button>
	</form>
</body>

</html>