<?php
class JokeBuilder extends Builder{
	
	public function __construct(){
		$this->addProperty('title');
		$this->addProperty('joke');
		$this->addProperty('post_date');
		$this->addProperty('author');
	}
	
	public function build(){
		$result = "<h3>{$this->title}</h3>";
		$result .= '<div class="contentBox">';
		$result .= "<p>{$this->joke}</p>";
		$result .= "<hr/>";
		$result .= "<p class=\"footerText\">posted from {$this->author} | {$this->post_date}</p></div>";
		
		return $result;
	}
}