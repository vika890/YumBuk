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
			<a href="index.php" class="change-link">Главная</a>
			<a href="auth.php" class="active">Вход</a>
			<a href="reg.php" class="change-link">Регистрация</a>
		</div>
	</header>
	
	<body>
		<div class="form">
			<h1>Вход</h1>
			<div class="input-form">
				<input type="text" id="login" placeholder="Логин">
			</div>
			
			<div class="input-form">
				<input type="password" id="password" placeholder="Пароль">
			</div>
			
			<div class="input-form">
				<input type="submit" value="Войти" onclick="login()">
			</div>

			<div id="message"></div>
		</div>

		<script src="greeting.js"></script>
	</body>

	<footer style="margin-top: 500px;">
		<?php include "footer.html" ?>
	</footer>
</html>