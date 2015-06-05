<div id="contentColumn">
	<h2>Register</h2>
	<h3>Register</h3>
	<div class="contentBox">
		<p>Geben Sie die geforderten Daten ein und bestätigen Sie mit
			"Registrieren" um ein neues Konto anzulegen.</p>
			
		<script src="http://btabib.dev.bbc-projects.ch/view/js/md5.js"></script>
		<script src="http://btabib.dev.bbc-projects.ch/view/js/utf8_encode.js"></script>
		<script src="http://btabib.dev.bbc-projects.ch/view/js/validateRegisterData.js"></script>
		
		<form action="http://btabib.dev.bbc-projects.ch/Register/Submit" method="post"
			class="form" id="loginForm" onsubmit="validateRegisterData()">
				<label for="username">Benutzername</label> 
				<input type="text" name="username" placeholder="Benutzername"> 
				
				<label for="password">Passwort</label>
				<input type="password" name="password" placeholder="Passwort" id="passwordInput"> 
				
				<label for="repeatPassword">Passwort wiederholen</label>
				<input type="password" name="repeatPassword" placeholder="Passwort wiederholen" id="repeatPasswordInput"> 
				
				<label for="submit">Log In</label> 
				
				<input type="submit" name="submit" value="Registrieren"> <input type="hidden"
					name="_password" id="_password">
		</form>
	</div></div>