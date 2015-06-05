<?php
class JokeHasCategoryModel extends Model{
	
	public function insertJokeAndCategory($joke, $category){
		$query = "INSERT INTO joke_has_category
				  (joke_ID, category_ID) 
				  VALUES
				  (
					(SELECT ID_joke FROM joke
						WHERE joke = '{$joke}'
						LIMIT 1),
					(SELECT ID_category FROM category
						WHERE category = '{$category}'
						LIMIT 1)
				  )";
		parent::executeQuery($query);
	}
	
	public function getJokesFromUser($username){
		$query = "SELECT j.ID_joke, j.joke, j.post_date, u.username
					FROM joke_has_category AS jhc
					LEFT JOIN joke AS j
					ON j.ID_Joke = jhc.joke_ID
                    LEFT JOIN user AS u
                    ON u.ID_user = j.author_ID
					WHERE u.username like '{$username}'";
		return parent::executeQueryAndReturnTable($query, array('ID_joke','joke','post_date','username'));
	}
	
	public function updateJokeHasCategory($id_joke, $category){
		$query = "UPDATE joke_has_category
				SET category_ID = (
					SELECT ID_category 
					FROM category 
					WHERE category like '{$category}')
				WHERE joke_ID = {$id_joke}";
		parent::executeQuery($query);
	}
}