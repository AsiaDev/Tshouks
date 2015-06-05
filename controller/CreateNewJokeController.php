<?php
class CreateNewJokeController {
	public function __construct() {
		$view = new View ( 'header', array (
				'title' => 'Neuen Witz erstellen',
		) );
		$view->display ();
		$catBuilder = new CategoriesBuilder ();
		echo $catBuilder;
	}
	public function index() {
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			$createNewJokeBuilder = new ChangeJokeBuilder ();
			echo $createNewJokeBuilder;
		} else {
			$messageBuilder = new MessageBuilder();
			$messageBuilder->accessDeniedMustLoggedIn();
		}
	}
	public function create() {
		if (isset ( $_SESSION ['loggedIn'] ) && $_SESSION ['loggedIn']) {
			
			$joke = $_POST ['jokeText'];
			$author = $_SESSION ['username'];
			$category = $_POST ['categorySelect'];
			
			require_once ('./model/JokeModel.php');
			$jokeModel = new JokeModel ();
			$jokeModel->createJoke ($joke, $author);
			
			require_once ('./model/JokeHasCategoryModel.php');
			$jokeHasCategoryModel = new JokeHasCategoryModel ();
			$jokeHasCategoryModel->insertJokeAndCategory ( $joke, $category );
			header ( "Location: http://btabib.dev.bbc-projects.ch/" );
		} else {
			$messageBuilder = new MessageBuilder();
			$messageBuilder->accessDeniedMustLoggedIn();
		}
	}
	public function __destruct() {
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		$view = new View ( 'footer' );
		$view->display ();
	}
}
