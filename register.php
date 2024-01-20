<?php
	include 'db.php';

	// Принимаем данные от клиента
	$surname = $_POST['surname'];
	$name = $_POST['name'];
	$patronymic = $_POST['patronymic'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Проверяем, существует ли пользователь с таким же именем
	$checkQuery = "SELECT * FROM users WHERE email='$email'";
	$checkResult = $mysqli->query($checkQuery);
	if ($checkResult->num_rows > 0) {
		echo "Пользователь с таким именем уже существует.";
	} else {
		// Регистрируем нового пользователя
		$registerQuery = "INSERT INTO users (surname, name, patronymic, email, password) VALUES ('$surname', '$name', '$patronymic', '$email', '$password')";
		if ($mysqli->query($registerQuery) === TRUE) {
			echo "Регистрация прошла успешно!";
		} else {
			echo "Ошибка при регистрации: " . $mysqli->error;
		}
	}

	$mysqli->close();
?>
