<?php

require_once('lib/Model.php');

class UserModel extends Model
{
    public function getUserPassword($user){
    	$query = "SELECT u.user_password FROM user AS u
    			WHERE u.username LIKE '{$user}'";
    	
    	return parent::executeQueryAndReturnTable($query, array('user_password'));
    }
    
    public function getAllUsers(){
    	$query = "SELECT u.username FROM user AS u";
    	
    	return parent::executeQueryAndReturnTable($query, array('username'));
    }
    
    public function createUser($username, $password){
    	$query = "INSERT INTO user (username, user_password, join_date) VALUES ('{$username}','{$password}',now())";
    	
    	parent::executeQuery($query);
    }
    
    public function getAuthorFromJoke($ID_joke){
    	$query = "SELECT u.username FROM 
    			joke AS j
    			LEFT JOIN user AS u
    			ON j.author_ID = u.ID_User
    			WHERE j.ID_joke = {$ID_joke}";
    	return parent::executeQueryAndReturnTable($query, array('username'));
    }
}
