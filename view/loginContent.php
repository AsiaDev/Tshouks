<div id="contentColumn">
	<h2>Login</h2>
	<h3>Login</h3>
	<div class="contentBox">
		<p>Geben Sie Ihre Benutzerdaten ein und bestätigen Sie mit dem
			Login-Button, um einzuloggen.</p>
		<script src="http://tshouks/view/js/md5.js"></script>
		<script src="http://tshouks/view/js/validateLoginData.js"></script>
		<script src="http://tshouks/view/js/utf8_encode.js"></script>
		<form action="http://tshouks/Login/Submit" method="post" class="form"
			id="loginForm" onsubmit="return validateData()" target="_blank">
				<label for="username">Benutzername</label> <input type="text"
					name="username" placeholder="Benutzername"> <label for="password">Passwort</label>
				<input type="password" name="password" placeholder="Passwort"
					id="passwordInput"> <label for="submit">Log In</label> <input
					type="submit" name="submit" value="Log In">
				<input type="hidden" name="_password" id="_password">

		</form>
	</div></div>