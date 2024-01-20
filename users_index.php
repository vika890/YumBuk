<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<header>
		<img class="logo" src="images/logo.png">
		<div>Поиск точек питания</div>
		<div class="menu">
			<a href="users_index.php" class="active">Главная</a>
			<a href="map.php" class="change-link">Карта</a>
			<a href="notes.php" class="change-link">Отзывы</a>
			<a href="index.php" class="change-link">Выход</a>
		</div>
	</header>
	
	<body>
		<div class="pulsate">
			<img src="images/pulsating-logo.png" alt="Pulsating Image" id="pulsating-img">
		</div>
		
		<script>
			window.onload = function() {
				var email = sessionStorage.getItem('email');
				var userId = sessionStorage.getItem('userId');
				document.getElementById('userId').innerText = userId;
			}
		</script>

		<div class="description">
			<p>"НямБук" - это приложение, предназначенное для поиска точек общественного питания с учётом рейтинга пользователей и местоположения.</p><br>
			
			<p>"НямБук" предоставляет возможность пользователям оставлять свои комментарии и отзывы о посещаемых заведениях.</p>
		</div>
	</body>

	<footer>
		<?php include "footer.html" ?>
	</footer>

</html>