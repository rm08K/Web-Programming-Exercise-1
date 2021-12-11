<?php
	$json_str = file_get_contents('php://input');
	$params = json_decode($json_str, TRUE);
	
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
