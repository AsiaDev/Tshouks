<?php

class NewestJokesController{
	public function __construct(){
		$view = new View('header', array('title' => 'Neuste Witze'));
		$view->display();
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
	}
	
	public function index(){
		$newestJokesBuilder = new NewestJokesBuilder();
		echo $newestJokesBuilder;
	}
	
	public function __destruct()
	{
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		$view = new View('footer');
		$view->display();
	}
	
}