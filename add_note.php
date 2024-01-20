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
			<a href="welcome.html" class="change-link">Карта</a>
			<a href="notes.php" class="change-link">Отзывы</a>
			<a href="index.php" class="change-link">Выход</a>
		</div>
	</header>

	<body>
		<div class="form">
			<h1>Заметка</h1>
			<div class="input-form">
				<input type="text" id="name" placeholder="Название">
			</div>

			<div class="input-form">
				<textarea type="textarea" id="address" cols="30" rows="2" placeholder="Адрес"></textarea>
			</div>

			<div class="input-form">
				<input type="text" id="phone" placeholder="Телефон">
			</div>

			<div class="input-form">
				<input type="text" id="date" placeholder="Дата посещения">
			</div>

			<div class="input-form">
				<textarea type="textarea" id="comment" cols="30" rows="3" placeholder="Комментарий"></textarea>
   			</div>

			<div class="rating-area">
				<input type="radio" id="star-5" name="rating" value="5">
				<label for="star-5"></label>
				<input type="radio" id="star-4" name="rating" value="4">
				<label for="star-4"></label>
				<input type="radio" id="star-3" name="rating" value="3">
				<label for="star-3"></label>
				<input type="radio" id="star-2" name="rating" value="2">
				<label for="star-2"></label>
				<input type="radio" id="star-1" name="rating" value="1">
				<label for="star-1"></label>
			</div>

			<div class="input-form">
				<input type="submit" value="Сохранить" onclick="save()">
			</div>

			<div id="saveMessage"></div>
		</div>
		
		<div class="input-form">
			<input type="hidden" id="global_id" placeholder="global_id">
		</div>

		<script>
			window.onload = function() {
				// Получаем данные из URL и заполняем ими поля формы
				var urlParams = new URLSearchParams(window.location.search);
				document.getElementById('name').value = urlParams.get('name');
				document.getElementById('address').value = urlParams.get('address');
				document.getElementById('phone').value = urlParams.get('phone');
				document.getElementById('global_id').value = urlParams.get('global_id')
				var userIdSpan = document.getElementById('userId');
				if (userIdSpan) {
					var userId = sessionStorage.getItem('userId');
					userIdSpan.innerText = userId;
				}
			};

			function save() {
				var name = document.getElementById('name').value;
				var address = document.getElementById('address').value;
				var phone = document.getElementById('phone').value;
				var date = document.getElementById('date').value;
				var comment = document.getElementById('comment').value;
				var rating = document.querySelector('input[name="rating"]:checked').value; // получаем значение выбранной звезды

				var global_id = document.getElementById('global_id').value; // Получаем значение global_id

				var userId = sessionStorage.getItem('userId');
				
				var xhr = new XMLHttpRequest();
				var url = 'note.php';
				var params = 'name=' + name + '&address=' + address + '&phone=' + phone + '&date=' + date + '&comment=' + comment + '&rating=' + rating + '&global_id=' + global_id + '&userId=' + userId; // Добавляем global_id к параметрам
				xhr.open('POST', url, true);
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						var response = xhr.responseText;
						document.getElementById('saveMessage').innerHTML = response;

						// Очищаем поля ввода
						document.getElementById('name').value = '';
						document.getElementById('address').value = '';
						document.getElementById('phone').value = '';
						document.getElementById('date').value = '';
						document.getElementById('comment').value = '';
						document.querySelector('input[name="rating"]:checked').checked = false;
						document.getElementById('global_id').value = '';
					}
				};
				xhr.send(params);
			}
		</script>
	</body>

	<footer style="margin-top: 600px;">
		<?php include "footer.html" ?>
	</footer>
</html>




