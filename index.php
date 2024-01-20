<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="style.css">
	</head>

	<header>
		<img class="logo" src="images/logo.png">
		<div>Поиск точек питания</div>
		<div class="menu">
		<a href="#" class="active">Главная</a>
		
		<?php
			// Проверяем, вошел ли пользователь в систему
			session_start();
			if (isset($_SESSION['user_id'])) {
				// Если пользователь вошел, отображаем ссылки на выход и информацию
				echo '<a href="logout.php" class="change-link">Выход</a>';
			} else {
				// Если пользователь не вошел, отображаем ссылки на вход и регистрацию
				echo '<a href="auth.php" class="change-link">Вход</a>';
				echo '<a href="reg.php" class="change-link">Регистрация</a>';
			}
		?>
		</div>
	</header>
	
	<body>
		<div class="pulsate">
			<img src="images/pulsating-logo.png" alt="Pulsating Image" id="pulsating-img">
		</div>

		<div class="description">
			<p>"НямБук" - это приложение, предназначенное для поиска точек общественного питания с учётом рейтинга пользователей и местоположения.</p><br>
			
			<p>"НямБук" предоставляет возможность пользователям оставлять свои комментарии и отзывы о посещаемых заведениях.</p>
		</div>
	</body>

	<footer>
		<?php include "footer.html" ?>
	</footer>
</html>
