function register() {
	var surname = document.getElementById('surname').value;
	var name = document.getElementById('name').value;
	var patronymic = document.getElementById('patronymic').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var xhr = new XMLHttpRequest();
	var url = 'register.php';
	var params = 'surname=' + surname + '&name=' + name + '&patronymic=' + patronymic + '&email=' + email + '&password=' + password;
	xhr.open('POST', url, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function() {
	  if (xhr.readyState == 4 && xhr.status == 200) {
	 var response = xhr.responseText;
	 document.getElementById('registrationMessage').innerHTML = response;
	 
	 // Очищаем поля ввода
	 document.getElementById('surname').value = '';
	 document.getElementById('name').value = '';
	 document.getElementById('patronymic').value = '';
	 document.getElementById('email').value = '';
	 document.getElementById('password').value = '';
	  }
	};
	xhr.send(params);
}
