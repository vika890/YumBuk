<?php
	include 'db.php';

	// Запрашиваем координаты точек из базы данных
	$result = $mysqli->query("SELECT dataset.global_id, dataset.name, dataset.net_object, dataset.operating_company, location.address, location.latitude, location.longitude, dataset.phone, dataset.seats_count, dataset.social_privileges, type_object.name as type_name, district_adm.district, district_adm.adm_area FROM dataset
							INNER JOIN location ON dataset.location = location.id
							INNER JOIN type_object ON dataset.type_object = type_object.id
							INNER JOIN district_adm ON dataset.district_adm = district_adm.id");


	$points = array();
	while ($row = $result->fetch_assoc()) {
		$points[] = $row;
	}

	// Возвращаем координаты точек в формате JSON
	header('Content-Type: application/json');
	echo json_encode($points);

	// Закрываем соединение с базой данных
	$mysqli->close();
?>
