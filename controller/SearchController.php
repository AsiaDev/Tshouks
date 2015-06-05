<?php
class SearchController{
	public function __construct()
	{
		$view = new View('header', array('title' => 'Suche'));
		$view->display();
		
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
	}
	
	public function index(){
		try{
			$jokesFromSearchBuilder = new JokesFromSearchBuilder();
			$jokesFromSearchBuilder->searchContent = $_POST['search'];
			echo $jokesFromSearchBuilder->build();
		}
		catch (Exeption $e){
			$messageBuilder = new MessageBuilder();
			$messageBuilder->requestFailedInvalidInput();
		}
	}
	
	public function __destruct(){
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		
		$view = new View('footer');
		$view->display();
	}	
}