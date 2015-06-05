<?php
class DeleteController {
	public function __construct() {
		$view = new View ( 'header', array (
				'title' => 'Witz löschen'
		) );
		$view->display ();
		$catBuilder = new CategoriesBuilder ();
		echo $catBuilder;
	}
	public function index($ID_joke) {
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			require_once ('./model/UserModel.php');
			$userModel = new UserModel ();
			
			if ($_SESSION ['username'] == $userModel->getAuthorFromJoke ( $ID_joke ) || $_SESSION ['username'] == "admin") {
				$view = new View ( 'MessageContent', array (
						'title' => 'Witz Löschen',
						'subtitle' => 'Bestätigung',
						'message' => "Du bist im Begriff diesen Witz zu löschen. Dieser Vorgang kann zunächst nicht rückgängig gemacht werden. Willst du fortfahren?\n<a href='http://btabib.dev.bbc-projects.ch/delete/submit/{$ID_joke}'>Bestätigen</a>" 
				) );
				$view->display ();
			} else {
				$messageBuilder = new MessageBuilder();
				$messageBuilder->accessDeniedWrongUser();
			}
		} else {
			$messageBuilder = new MessageBuilder();
			$messageBuilder->accessDeniedMustLoggedIn();
		}
	}
	public function submit($ID_joke) {
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			require_once ('./model/UserModel.php');
			$userModel = new UserModel ();
			
			if ($_SESSION ['username'] == $userModel->getAuthorFromJoke ( $ID_joke ) || $_SESSION ['username'] == "admin") {
				require_once ('./model/JokeModel.php');
				$jokeModel = new JokeModel ();				
				$jokeModel->deleteJoke ( $ID_joke );
				
				header ("Location: http://btabib.dev.bbc-projects.ch/");
			} else {
				$messageBuilder = new MessageBuilder();
				$messageBuilder->accessDeniedWrongUser();
			}
		}
	}
	public function __destruct() {
		$rightColumnBuilder = new RightColumnBuilder ();
		echo $rightColumnBuilder;
		$view = new View ( 'footer' );
		$view->display ();
	}
}