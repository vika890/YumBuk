<?php
	include 'db.php';

	// Обработка запроса на удаление записи
	if (isset($_POST['note_id'])) {
		$note_id = $_POST['note_id'];
		$sql = "DELETE FROM notes WHERE id = $note_id";
		if ($mysqli->query($sql) !== TRUE) {
			echo "Error deleting record: " . $mysqli->error;
		}
	}

	$mysqli->close();
?>