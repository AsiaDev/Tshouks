<?php
class JokesFromCategoryBuilder extends Builder{
	public function __construct(){
		$this->addProperty('category');
		$this->addProperty('jokes');
	}
	
	public function build(){
		require_once('model\JokesFromCategoryModel.php');
		
		$jokesFromCategoryModel = new JokesFromCategoryModel();
		$jokes = $jokesFromCategoryModel->getAllJokesFromCategory($this->category);
		
		$result = '<div id="contentColumn">';
		$result .= "<h2>{$this->category}</h2>";
		foreach ($jokes as $joke){
			$jokeBuilder = new JokeBuilder();
			$jokeBuilder->title = $joke[0];
			$jokeBuilder->joke = $joke[1];
			$jokeBuilder->post_date = $joke[2];
			$jokeBuilder->author = $joke[3];
			$result .= $jokeBuilder;
		}
		$result .= '</div>';
		
		return $result;
	}
}