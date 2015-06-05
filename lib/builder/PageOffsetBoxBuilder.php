<?php
class PageOffsetBoxBuilder{
	public function build($jokes){
		$result =  "<div id='pageOffsetBox'>";
		
		// determine what is needed
		$previousClass = 'pageOffsetButton deactivated';
		$previousHref = '#';
		
		if ($GLOBALS['offset']>=$GLOBALS['limit']){
			
			// set previous href
			$previousHref = "http://btabib.dev.bbc-projects.ch{$GLOBALS['uri']}?
				limit={$GLOBALS['limit']}&
				offset=" . 
				( string ) ( int ) ($GLOBALS ['offset'] - $GLOBALS ['limit']);
			
			// set previous class
			$previousClass = 'pageOffsetButton';
		}
		
		$nextClass = 'pageOffsetButton deactivated';
		$nextHref = '#';
		
		if ($jokes == $GLOBALS['limit']){
			
			// set next href
			$nextHref = "http://btabib.dev.bbc-projects.ch{$GLOBALS['uri']}?
				limit={$GLOBALS['limit']}&
				offset=" .
				( string ) ( int ) ($GLOBALS ['offset'] + $GLOBALS ['limit']);
			
			// set next class
			$nextClass = 'pageOffsetButton';
		}
		
		// put all together
		$result .= "<a class='{$previousClass}' href='{$previousHref}' title='Eine Seite zurück'>Zurück</a>";
		
		$result .= "<a class='{$nextClass}' href='{$nextHref}' title='Eine Seite vorwärts'>Vor</a>";
		
		$result .= "</div>";
		
		// return result
		return $result;
	}

}