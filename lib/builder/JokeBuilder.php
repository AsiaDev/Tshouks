<?php
class JokeBuilder extends Builder{
	
	public function __construct(){
		$this->addProperty('title');
		$this->addProperty('joke');
		$this->addProperty('post_date');
		$this->addProperty('author');
	}
	
	public function build(){
		$result = "<h3>{$title}</h3>";
		$result .= '<div class="contentBox">';
		$result .= "<p>{$joke}</p>";
		$result .= "<p>{$post_date} | posted from {$author}</p>";
		
		return $result;
	}
}