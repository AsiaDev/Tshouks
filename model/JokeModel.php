<?php

require_once('lib/Model.php');

class JokeModel extends Model
{
    protected $tableName = 'joke';
    
    public function getAllJokes(){
    	$query = "SELECT j.ID_joke, j.joke, j.post_date, u.username FROM $this->tableName AS j INNER JOIN USER AS u ON j.author_ID = u.ID_user";
    	
    	return parent::executeQueryAndReturnTable($query, array('ID_joke', 'joke','post_date','username'));
    }
    
    public function createJoke($joke, $username){
    	$query = "INSERT INTO {$this->tableName} (joke, post_date, author_ID)
    	VALUES (
    			'{$joke}',
    			now(),
    			(SELECT ID_user FROM user
    				WHERE username like '{$username}'))";
    	parent::executeQuery($query);
    }
    
    public function deleteJoke($ID_joke){
    	$query = "DELETE FROM joke
    	WHERE ID_joke = {$ID_joke}";
    	parent::executeQuery($query);
    }
    
    public function getJokeById($ID_joke){
    	$query = "SELECT j.ID_joke, j.joke, j.post_date, u.username 
    			FROM joke AS j
    			LEFT JOIN user AS u
    			ON j.author_ID = u.ID_user
    			WHERE j.ID_joke = {$ID_joke}";
    	return parent::executeQueryAndReturnTable($query, array('ID_joke', 'joke','post_date','username'));
    }
    
    public function updateJoke($id_joke, $joke){
    	$query = "UPDATE joke 
    			SET joke='{$joke}'
    			WHERE ID_joke = {$id_joke}";
    	parent::executeQuery($query);
    }
    
    public function getAllJokesFromSearch($searchContent){
    	$query = "SELECT j.ID_joke, j.joke, j.post_date, u.username FROM
    	joke AS j
    	LEFT JOIN user AS u
    	ON j.author_ID = u.ID_User
    	WHERE j.joke LIKE '%{$searchContent}%'";
    
    	return parent::executeQueryAndReturnTable($query, array('ID_joke', 'joke','post_date','username'));
    }
}
