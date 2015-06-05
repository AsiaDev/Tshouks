<?php
require_once('lib/Model.php');

class JokesFromCategoryModel extends Model{
	
	public function getAllJokesFromCategory($category){			
		$query = "SELECT j.ID_joke, j.joke, j.post_date, u.username FROM 
		joke_has_category AS jhc 
		LEFT JOIN category AS c 
		ON jhc.category_ID = c.ID_category 
		LEFT JOIN joke AS j 
		ON j.ID_joke = jhc.joke_ID 
		LEFT JOIN user AS u 
		ON u.ID_user = j.author_ID 
		WHERE c.category LIKE '{$category}'";
		
		return parent::executeQueryAndReturnTable($query, array('ID_joke', 'joke','post_date','username'));
	}
}