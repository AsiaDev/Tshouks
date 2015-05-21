<?php

class NewestJokesBuilder extends Builder{
	public function __construct(){
		$this->addProperty('jokes');
		$this->addProperty('limit');
	}
	
	public function build(){
		require_once('model\NewestJokesModel.php');
		
		$newestJokesModel = new NewestJokesModel();
		$jokes = $newestJokesModel->getNewestJokes($this->limit);
		
		$result = '<div id="contentColumn">';
		$result .= "<h2>Newest Jokes</h2>";
		
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