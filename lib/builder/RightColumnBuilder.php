<?php
class RightColumnBuilder extends Builder{
	public function __construct(){
		
	}
	
	public function build(){
		echo '<div id="rightColumn">';
		$view = new View('searchBox');
		$view->display();
		
		$result = '</div>';
		
		return $result;
	}
}