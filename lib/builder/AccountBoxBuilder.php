<?php
class AccountBoxBuilder{
	
	public function __construct(){
		echo "<div id='account'>";
		
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
			echo "<a href='http://tshouks/SignOut'>Abmelden</a>";
		}
		else{
			echo "<a href='http://tshouks/Login/index'>Log In</a> or
				<a href='http://tshouks/Register/index'>Register</a>";
		}
		
		echo "</div>";
	}
}