<?php
class JokesFromUserBuilder extends Builder{
	
	public $username = '';
	
	public function __construct(){
		$this->addProperty('jokes');
	}
	
	public function build(){
		require_once('./model/JokeHasCategoryModel.php');
		
		$jokeHasCategoryModel = new JokeHasCategoryModel();
		$this->jokes = $jokeHasCategoryModel->getJokesFromUser($this->username);
		
		$contentFromJokesBuilder = new ContentFromJokesBuilder();
		$contentFromJokesBuilder->topic = "Witze von '{$this->username}'";
		$contentFromJokesBuilder->jokes = $this->jokes;
		
		return $contentFromJokesBuilder->build();
	}
}