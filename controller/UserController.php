<?php
class UserController{
	public function __construct(){
		
	}
	
	public function index ($username){
		$view = new View('header', array('title' => "Witze von {$username}"));
		$view->display();
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		$jokesFromUserBuilder = new JokesFromUserBuilder();
		$jokesFromUserBuilder->username = $username;
		echo $jokesFromUserBuilder;
	}
	
	public function __destruct()
	{
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		$view = new View('footer');
		$view->display();
	}
}