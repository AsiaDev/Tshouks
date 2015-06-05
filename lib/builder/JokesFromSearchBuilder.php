<?php
class JokesFromSearchBuilder extends Builder{
	public function __construct(){
		$this->addProperty('searchContent');
		$this->addProperty('jokes');
	}
	
	public function build(){
		require_once('./model/JokeModel.php');
		
		$jokeModel = new JokeModel();
		$this->jokes = $jokeModel->getAllJokesFromSearch($this->searchContent);
		
		$contentFromJokesBuilder = new ContentFromJokesBuilder();
		$contentFromJokesBuilder->topic = "Witze mit Inhalt: '{$this->searchContent}'";
		$contentFromJokesBuilder->jokes = $this->jokes;
		
		return $contentFromJokesBuilder->build();
	}
}