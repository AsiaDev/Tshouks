<?php
require_once('lib/Model.php');

class NewestJokesModel extends Model{
	public function getNewestJokes($limit=5){
		$query = "SELECT j.title, j.joke, j.post_date, u.username 
				FROM JOKE AS j 
				LEFT JOIN USER AS u 
				ON u.ID_user = j.author_ID 
				ORDER BY j.post_date DESC
				LIMIT {$limit}";
		return parent::executeQueryAndReturnTable($query, array('title', 'joke', 'post_date', 'username'));
	}
}