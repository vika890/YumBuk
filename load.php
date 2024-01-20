<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<body>
		<div class="ghost">
			<img src="images/ghost2.gif" alt="Ghost" id="loader-img">
			<p id="loading-text">Подождите, сайт загружается...</p>	
		</div>
		<script src="script.js"></script>

		<div class="container" style="display:none;">
			<?php include 'index.php'; ?>
		</div>
	</body>
</html>
