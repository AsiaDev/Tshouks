<?php
class JokesFromCategoryBuilder extends Builder {
	public function __construct() {
		$this->addProperty ( 'category' );
		$this->addProperty ( 'jokes' );
	}
	public function build() {
		require_once ('./model/JokesFromCategoryModel.php');
		
		$jokesFromCategoryModel = new JokesFromCategoryModel ();
		$this->jokes = $jokesFromCategoryModel->getAllJokesFromCategory ( $this->category );
		
		$contentFromJokesBuilder = new ContentFromJokesBuilder();
		$contentFromJokesBuilder->topic = $this->category;
		$contentFromJokesBuilder->jokes = $this->jokes;
		
		return $contentFromJokesBuilder->build();
	}
}