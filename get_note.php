<?php
	// Подключаемся к базе данных
	include 'db.php';

	// Запрашиваем информацию из базы данных
	$result = $mysqli->query("SELECT dataset.name, location.address, dataset.phone FROM dataset
							INNER JOIN location ON dataset.location = location.id");


	$points = array();
	while ($row = $result->fetch_assoc()) {
		$points[] = $row;
	}

	// Возвращаем информацию в формате JSON
	header('Content-Type: application/json');
	echo json_encode($points);

	// Закрываем соединение с базой данных
	$mysqli->close();
?>