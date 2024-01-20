<?php
	include 'db.php';

	// Принимаем данные от клиента
	$date = $_POST['date'];
	$comment = $_POST['comment'];
	$rating = $_POST['rating'];
	$global_id = $_POST['global_id'];
	$userId = $_POST['userId'];

	// Проверяем, существует ли такая заметка
	$checkQuery = "SELECT * FROM notes WHERE global_id='$global_id' AND user_id='$userId'";
	$checkResult = $mysqli->query($checkQuery);
	if ($checkResult->num_rows > 0) {
		echo "Отзыв для данной метки уже существует";
	} else {
		// Добавляем новую заметку
		$saveQuery = "INSERT INTO notes (global_id, date, comment, rating, user_id) VALUES ('$global_id', '$date', '$comment', '$rating', '$userId')";
		if ($mysqli->query($saveQuery) === TRUE) {
			echo "Отзыв сохранен!";
		} else {
			echo "Ошибка при сохранении отзыва : " . $mysqli->error;
		}
	}
	$mysqli->close();
?>
