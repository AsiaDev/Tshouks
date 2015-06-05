<?php
class MessageBuilder extends Builder{
	
	public function build(){
		// placeholder
		return '';
	}
	
	public function accessDeniedMustLoggedIn(){
		$view = new View('MessageContent', array(
							'title' => 'Zugriff verweigert',
							'subtitle' => 'Beschreibung',
							'message' => 'Du musst eingeloggt sein, um dieses Feature verwenden zu können.'
		));
		$view->display();
	}
	
	public function accessDeniedWrongUser(){
		$view = new View('MessageContent', array(
				'title' => 'Zugriff verweigert',
				'subtitle' => 'Beschreibung',
				'message' => 'Dieses Benutzerkonto hat keine Berechtigung, um dieses Feature verwenden zu können.'
		));
		$view->display();
	}
	
	public function requestFailedInvalidInput(){
		$view = new View('MessageContent', array (
				'title' => 'Anfrage fehlgeschlagen',
				'subtitle' => 'Beschreibung',
				'message' => 'Die Angaben/Eingaben von dir haben einen Fehler verursacht! Entweder wurden keine Angaben oder unerlaubte Zeichen wie zum Beispiel Anführungszeichen verwendet. Bitte beschränke dich auf normale Buchstaben.'
		));
		$view->display();
	}
	
	public function registerFailedUsedUsername(){
		$view = new View('MessageContent', array(
				'title' => 'Registrierung fehlgeschlagen',
				'subtitle' => 'Beschreibung',
				'message' => 'Der von dir gewählte Benutzername gibt es bereits. Versuch es mit einerm anderen.'
		));
		$view->display;
	}
	
	public function loginFailedWrongPassword(){
		$view = new View('MessageContent', array(
				'title' => 'Einloggen fehlgeschlagen',
				'subtitle' => 'Beschreibung',
				'message' => 'Das eingegebene Passwort ist falsch.'
		));
		$view->display;
	}
	
}