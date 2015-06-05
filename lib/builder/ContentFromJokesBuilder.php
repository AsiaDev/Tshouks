<?php
class ContentFromJokesBuilder extends Builder {
	
	public $topic = '';
	public $jokes = array();	
	
	public function __construct() {
	}
	public function build() {	
		$result = '<div id="contentColumn">';
		$result .= "<h2>{$this->topic}</h2>";
		
		$pageOffsetBoxBuilder = new PageOffsetBoxBuilder();
		
		$result .= $pageOffsetBoxBuilder->build(count($this->jokes));
		
		foreach ( $this->jokes as $joke ) {
			$jokeBuilder = new JokeBuilder ();
			$jokeBuilder->ID_joke = $joke[0];
			$jokeBuilder->joke = $joke [1];
			$jokeBuilder->post_date = $joke [2];
			$jokeBuilder->author = $joke [3];
			$result .= $jokeBuilder;
		}
		$result .= $pageOffsetBoxBuilder->build(count($this->jokes));
		
		$result .= '</div>';
		
		return $result;
	}
	
	public function __destruct(){
		
	}
}