<?php

class DefaultController
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
		
		$view = new View('homeContent');
		$view->display();
		
		$rightColumnBuilder = new RightColumnBuilder();
		
		echo $rightColumnBuilder;
	}

	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
}
