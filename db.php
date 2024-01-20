<?php
	$mysqli = new mysqli('localhost', 'vika', 'asdfgh', 'coursework2');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>