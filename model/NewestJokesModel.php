<?php
require_once('lib/Model.php');

class NewestJokesModel extends Model{
	public function getNewestJokes(){
		$query = "SELECT j.ID_joke,  j.joke, j.post_date, u.username 
				FROM joke AS j 
				LEFT JOIN user AS u 
				ON u.ID_user = j.author_ID 
				ORDER BY j.post_date DESC";
		return parent::executeQueryAndReturnTable($query, array('ID_joke', 'joke', 'post_date', 'username'));
	}
}