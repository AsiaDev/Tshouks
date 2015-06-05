<?php

class DefaultController
{
	public function __construct()
	{
		$view = new View('header', array('title' => 'Home'));
		$view->display();
		
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
	}

	public function index()
	{
		$view = new View('homeContent');
		$view->display();

	}
	
	public function SignOut(){
		session_destroy();
		header('Location: http://btabib.dev.bbc-projects.ch/');
	}
	
	public function contact(){
		$view = new View('contactContent');
		$view->display();
	}

	public function __destruct()
	{
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		
		$view = new View('footer');
		$view->display();
	}
}
