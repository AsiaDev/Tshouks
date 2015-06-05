<?php
class JokeBuilder extends Builder {
	public function __construct() {
		$this->addProperty ( 'ID_joke' );
		$this->addProperty ( 'joke' );
		$this->addProperty ( 'post_date' );
		$this->addProperty ( 'author' );
	}
	public function build() {
		$result = '<div class="contentBox">';
		$result .= "<p>{$this->joke}</p>";
		$result .= "<hr/>";
		$result .= "<p 
		class=\"footerText\">posted from 
			<a 
				href='
					http://btabib.dev.bbc-projects.ch/User/Index/{$this->author}' 
					
				title='Alle Witze von {$this->author} anzeigen lassen'>{$this->author}</a> | {$this->post_date} | <a href='http://btabib.dev.bbc-projects.ch/Update/Index/{$this->ID_joke}'>bearbeiten</a> | <a href='http://btabib.dev.bbc-projects.ch/Delete/Index/{$this->ID_joke}'>löschen</a></p></div>";
		
		return $result;
	}
}