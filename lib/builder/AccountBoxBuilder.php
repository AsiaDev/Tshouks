<?php
class AccountBoxBuilder{
	
	public function __construct(){
		echo "<div id='account'>";
		
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
			$result="Angemeldet als <a href=\"http://btabib.dev.bbc-projects.ch/User/index/{$_SESSION['username']}\" title='Alle Witze von {$_SESSION['username']} anzeigen lassen'> {$_SESSION['username']}</a> | ";
			$result.= "<a href='http://btabib.dev.bbc-projects.ch/Default/SignOut'>Abmelden</a>";
			echo $result;
		}
		else{
			echo "<a href='http://btabib.dev.bbc-projects.ch/Login/index'>Log In</a> or
				<a href='http://btabib.dev.bbc-projects.ch/Register/index'>Register</a>";
		}
		
		echo "</div>";
	}
}

new AccountBoxBuilder();
?>