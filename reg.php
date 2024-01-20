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
			<a href="auth.php" class="change-link">Вход</a>
			<a href="reg.php" class="active">Регистрация</a>
		</div>
	</header>
	
	<body>
	<div class="form">
			<h1>Регистрация</h1>
			<div class="input-form">
				<input type="text" id="surname" placeholder="Фамилия">
			</div>

			<div class="input-form">
				<input type="text" id="name" placeholder="Имя">
			</div>

			<div class="input-form">
				<input type="text" id="patronymic" placeholder="Отчество">
			</div>

			<div class="input-form">
				<input type="text" id="email" placeholder="Почта">
			</div>
			
			<div class="input-form">
				<input type="password" id="password" placeholder="Пароль">
			</div>

			<div class="input-form" style="margin-bottom: 40px">
				<input type="submit" value="Зарегистрироваться" onclick="register()">
			</div>

			<div id="registrationMessage"></div>
		</div>

		<script src="register.js"></script>
	</body>

	<footer style="margin-top: 600px;">
		<?php include "footer.html" ?>
	</footer>
</html>
