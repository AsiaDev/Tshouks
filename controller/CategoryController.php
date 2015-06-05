<?php

class CategoryController
{
	public function __construct()
	{
	}

	public function index($category)
	{
		$view = new View('header', array('title' => "{$category}"));
		$view->display();
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		$jokesFromCategoryBuilder = new JokesFromCategoryBuilder();
		$jokesFromCategoryBuilder->category = $category;
		
		echo $jokesFromCategoryBuilder->build();
	}

	public function __destruct()
	{
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		$view = new View('footer');
		$view->display();
	}
}
