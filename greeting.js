function login() {
	var login = document.getElementById('login').value;
	var password = document.getElementById('password').value;
	var xhr = new XMLHttpRequest();
	var url = 'login.php';
	var params = 'login=' + login + '&password=' + password;
	xhr.open('POST', url, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function() {
	  if (xhr.readyState == 4 && xhr.status == 200) {
		var response = xhr.responseText;
		
		if (response.includes('success')) {
			var userData = response.split('|');
			var username = userData[2];
			var userId = userData[1];
			sessionStorage.setItem('username', username);
			sessionStorage.setItem('userId', userId);
			window.location.href = 'users_index.php';
		}
		else {
		  document.getElementById('message').innerHTML = 'Неправильный логин или пароль';
		}
	  }
	};
	xhr.send(params);
  }
  