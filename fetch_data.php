<?php
	include 'db.php';

	$result = $mysqli->query("SELECT dataset.name, location.address, dataset.phone FROM dataset
							INNER JOIN location ON dataset.location = location.id");
	$data = $result->fetch_assoc();

	header('Content-Type: application/json');
	echo json_encode($data);

	$mysqli->close();
?>