<?php
class JokesFromCategoryBuilder extends Builder{
	public function __construct(){
		$this->addProperty('category');
		$this->addProperty('jokes');
	}
	
	public function build(){
		$jokeFromCategoryModel = new JokeFromCategoryModel();
		$jokes = $jokeFromCategoryModel->getAllJokesFromCategory($this->category);
		
		$result = "<h2>{$category}</h2>";
		foreach ($jokes as $joke){
			$jokeBuilder = new JokeBuilder();
			$jokeBuilder->title = $joke[0];
			$jokeBuilder->joke = $joke[1];
			$jokeBuilder->post_date = $joke[2];
			$jokeBuilder->author = $joke[3];
			$result .= $jokeBuilder;
		}
		
		return $result;
	}
}