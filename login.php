<?php
	include 'db.php';

	// Принимаем данные от клиента
	$login = $_POST['login'];
	$password = $_POST['password'];

	// Запрос к базе данных
	$sql = "SELECT * FROM users WHERE email='$login' AND password='$password'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo "success|" . $row["id"] . "|" . $row["email"];
	} else {
		echo "error";
	}

	$mysqli->close();
?>
