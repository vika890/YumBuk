<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Welcome Page</title>

		<!-- Подключаем библиотеку Leaflet -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
		<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

		
		<!-- Для меток -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.Default.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/leaflet.markercluster.js"></script>

		<link rel="stylesheet" href="style.css">

	</head>

	<header>
		<img class="logo" src="images/logo.png">
		<div>Поиск точек питания</div>
		<div class="menu">
			<a href="users_index.php" class="change-link">Главная</a>
			<a href="map.php" class="change-link">Карта</a>
			<a href="notes.php" class="active">Отзывы</a>
			<a href="index.php" class="change-link">Выход</a>
		</div>
	</header>
	
	<body>
		<div class="text" style="font-size: large; text-align: center; ">
			<p>На этой странице отображаются все отзывы по рейтингу</p>
			<?php
				include 'db.php';
				
				$sql = "SELECT COUNT(*) as count FROM notes";

				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo 'Количество: ' . $row["count"] ;
					}
				}
			?>
		</div>

		<div class="table-wrap">
		<table>
			<tr>
				<th>Название</th>
				<th>Адрес</th>
				<th>Телефон</th>
				<th>Дата посещения</th>
				<th>Комментарий</th>
				<th>Рейтинг</th>
			</tr>

			<?php
				include 'db.php';
				
				$sql = "SELECT dataset.name, location.address, dataset.phone, notes.date, notes.comment, notes.rating FROM notes
						INNER JOIN dataset USING(global_id) INNER JOIN location ON location.id=dataset.location
						ORDER BY rating DESC";

				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["name"] . "</td><td>" . $row["address"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["date"] . "</td><td>" . $row["comment"] . "</td><td>";
						for ($i = 1; $i <= $row["rating"]; $i++) {
							echo "<span class='star'>★</span>";
						}
						echo "</td>";
			?>

			<?php
				echo "</tr>";
					}
				} else {
					echo "0 results";
				}
				$mysqli->close();
			?>
		</table>
		</div>
	</body>

	<footer style="margin-top: 170px;">
		<?php include "footer.html" ?>
	</footer>
</html>