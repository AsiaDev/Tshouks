<?php
class CreateNewJokeController
{
	public function __construct()
	{
		$view = new View('header', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}

	public function index()
	{
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;

		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
			$createNewJokeBuilder = new CreateNewJokeBuilder();
			echo $createNewJokeBuilder;
		}
		else{
			echo "not logged in";
		}

		$rightColumnBuilder = new RightColumnBuilder();

		echo $rightColumnBuilder;
	}

	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
}
