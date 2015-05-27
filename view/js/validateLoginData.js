function validateData(){
	document.getElementById('loginForm');
	var password = document.getElementById('passwordInput');
	var _password = document.getElementById('_password');
	_password.value = md5(password.value);
	password.value = '';
}