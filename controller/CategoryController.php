<?php

class CategoryController
{
	public function __construct()
	{
		$view = new View('header', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}

	public function index($category)
	{
		echo '<div id="mainContainer" class="container">';
		
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		$jokesFromCategoryBuilder = new JokesFromCategoryBuilder();
		$jokesFromCategoryBuilder->category = $category;
		
		$rightColumnBuilder = new RightColumnBuilder();
		
		echo $rightColumnBuilder;
	}

	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
}
