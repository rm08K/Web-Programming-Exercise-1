<?php
function mapping($c)
{
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
	$ret = implode('', array_map('mapping', $chars));
}
header('Content-Type: application/json');
$json = array('result' => $ret);
echo json_encode($json);
?>