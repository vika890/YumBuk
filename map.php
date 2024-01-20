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
			<a href="map.php" class="active">Карта</a>
			<a href="notes.php" class="change-link">Отзывы</a>
			<a href="index.php" class="change-link">Выход</a>
		</div>
	</header>
	
	<body>
		<div class="text" style="font-size: large; text-align: center; ">
			<p>На этой странице отображаются точки питания. Если на карте их ещё нет, подождите, они загружаются</p>
		</div>


		<script>
			window.onload = function() {
				var email = sessionStorage.getItem('email');
				var userId = sessionStorage.getItem('userId');
				document.getElementById('userId').innerText = userId;
			}
		</script>
		
		<!-- Создаем контейнер для карты -->
		<div class="map-container">
			<div id="map"></div>
			<div id="point-info"></div>
  		</div>

		<!-- Инициализируем карту в JavaScript -->
		<script>
			// Создаем объект карты и центрируем его на Москве
			var map = L.map('map').setView([55.7522200, 37.6155600], 10);

			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); // Добавляем слой oms

			// Создаем объект для группировки меток
			var markers = L.markerClusterGroup().addTo(map);
			

			// Функция для обработки нажатия на маркер
			function onMarkerClick(e) {
				var point = e.target.point; // получаем данные точки из маркера
				// Формируем информацию о точке с дополнительными данными
				var pointInfo = '<b>' + point.name + '</b><br>' + 
					'Адрес: ' + point.address + '<br>' +
					'Административный округ: ' + point.adm_area + '<br>' +
					'Район: ' + point.district + '<br>' +
					'Вид объекта: ' + point.type_name + '<br>' +
					'Является сетевым: ' + point.net_object + '<br>' +
					'Название управляющей компании: ' + point.operating_company + '<br>' +
					'Число посадочных мест: ' + point.seats_count + '<br>' +
					'Социальные льготы: ' + point.social_privileges + '<br>' +
					'Контактный телефон: ' + point.phone + '<br>' ;

				pointInfo += '<button onclick="addToNotes(\''+point.name+'\',\''+point.address+'\',\''+point.phone+'\',\''+point.global_id+'\')">Добавить в отзывы</button>';

				document.getElementById('point-info').innerHTML = pointInfo; // выводим информацию под картой
			}

			function addToNotes(name, address, phone, globalId) {
  				window.open('add_note.php?name='+encodeURIComponent(name)+'&address='+encodeURIComponent(address)+'&phone='+encodeURIComponent(phone)+'&global_id='+encodeURIComponent(globalId));
			}

			// Запрашиваем координаты точек из базы данных
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'get_points.php', true);
			xhr.onload = function() {
			if (xhr.status === 200) {
				// Если запрос успешен, получаем координаты точек
				var points = JSON.parse(xhr.responseText);
				// Добавляем маркеры на карту для каждой точки
				for (var i = 0; i < points.length; i++) {
					var marker = L.marker([points[i].latitude, points[i].longitude]);
					// Добавляем данные точки к маркеру
					marker.point = points[i];
					marker.on('click', onMarkerClick); // привязываем обработчик нажатия на маркер
					markers.addLayer(marker);
				}
			} else {
				// Если запрос не удался, выводим сообщение об ошибке
				alert('Ошибка: ' + xhr.statusText);
			}
			};
			xhr.onerror = function() {
				alert('Ошибка сети');
			};
			xhr.send();
		</script>
	</body>

	<footer style="margin-top: 70px;">
		<?php include "footer.html" ?>
	</footer>
</html>




