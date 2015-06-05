<?php

class NewestJokesBuilder extends Builder{
	public function __construct(){
		$this->addProperty('jokes');
	}
	
	public function build(){
		require_once('./model/NewestJokesModel.php');
		
		$newestJokesModel = new NewestJokesModel();
		$jokes = $newestJokesModel->getNewestJokes();
		
		$contentFromJokesBuilder = new ContentFromJokesBuilder();
		$contentFromJokesBuilder->topic = "Neuste Witze";
		$contentFromJokesBuilder->jokes = $jokes;
		
		return $contentFromJokesBuilder->build();
	}
}