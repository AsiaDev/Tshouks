function validateRegisterData(){	
	document.getElementById('loginForm');
	var password = document.getElementById('passwordInput');
	var repeatPassword = document.getElementById('repeatPasswordInput');
	var _password = document.getElementById('_password');
	
	if (password.value != repeatPassword.value){
		alert("Passwörter stimmen nicht überein");
		return false;
	}
	
	_password.value = md5(password.value);
	password.value = '';
	
	return true;
}