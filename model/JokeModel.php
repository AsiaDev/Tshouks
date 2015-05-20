<?php

require_once('lib/Model.php');

class JokeModel extends Model
{
    protected $tableName = 'joke';
    
    public function getAllJokes(){
    	$query = "SELECT j.title, j.joke, j.post_date, u.username FROM $this->tableName AS j INNER JOIN USER AS u ON j.author_ID = u.ID_user";
    	
    	return parent::executeQueryAndReturnTable($query, array('title','joke','post_date','username'));
    }
}
