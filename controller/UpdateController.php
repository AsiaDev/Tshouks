<?php
class UpdateController {
	public function __construct() {
		$view = new View ( 'header', array (
				'title' => 'Bearbeiten'
		) );
		$view->display ();
		$catBuilder = new CategoriesBuilder ();
		echo $catBuilder;
	}
	public function index($id_joke) {
		require_once('./model/UserModel.php');
		
		$userModel = new UserModel();
		
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			if ($_SESSION ['username'] == $userModel->getAuthorFromJoke ( $id_joke )[0][0] || $_SESSION ['username'] == "admin"){
				require_once('./model/JokeModel.php');
				
				$jokeModel = new JokeModel();
				$joke = $jokeModel->getJokeById($id_joke);
				
				$createNewJokeBuilder = new ChangeJokeBuilder ();
				echo $createNewJokeBuilder->buildUpdate($joke[0][0], $joke[0][1], $joke[0][2]);
			}
			else{
				$messageBuilder = new MessageBuilder();
				$messageBuilder->accessDeniedWrongUser();
			}
		} else {
			$messageBuilder = new MessageBuilder();
			$messageBuilder->accessDeniedMustLoggedIn();
		}
	}
	
	public function update($id_joke){
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			
			$joke = $_POST ['jokeText'];
			$category = $_POST ['categorySelect'];
				
			require_once ('./model/JokeModel.php');
			$jokeModel = new JokeModel ();
			$jokeModel->updateJoke ($id_joke, $joke);
				
			require_once ('./model/JokeHasCategoryModel.php');
			$jokeHasCategoryModel = new JokeHasCategoryModel ();
			$jokeHasCategoryModel->updateJokeHasCategory ($id_joke, $category );
			header ( "Location: http://btabib.dev.bbc-projects.ch/" );
		} else {
			$messageBuilder = new MessageBuilder();
			$messageBuilder->accessDeniedMustLoggedIn();
		}
	}
	
	public function __destruct() {
		$view = new View ( 'footer' );
		$view->display ();
	}
}