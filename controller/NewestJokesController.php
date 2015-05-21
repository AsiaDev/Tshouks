<?php

class NewestJokesController{
	public function __construct(){
		$view = new View('header', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}
	
	public function index($limit=5){
		echo '<div id="mainContainer" class="container">';
		
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		$newestJokesBuilder = new NewestJokesBuilder();
		$newestJokesBuilder->limit = $limit;
		echo $newestJokesBuilder;
		
		$rightColumnBuilder = new RightColumnBuilder();
		
		echo $rightColumnBuilder;
	}
	
	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
}