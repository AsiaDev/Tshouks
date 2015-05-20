<?php
require_once('lib/Model');

class JokeFromCategoryModel extends Model{
	
	public function getAllJokesFromCategory($category){
		$query = "SELECT j.title, j.joke, j.post_date, u.username FROM 
		JOKE_HAS_CATEGORY AS jhc 
		LEFT JOIN CATEGORY AS c 
		ON jhc.category_ID = c.ID_category 
		LEFT JOIN JOKE as j 
		ON j.ID_joke = jhc.joke_ID 
		LEFT JOIN USER as u 
		ON u.ID_user = j.author_ID 
		WHERE c.category like {$category};";
		 
		return parent::executeQueryAndReturnTable($query, array('title','joke','post_date','username'));
	}
}