<?php

require_once('lib/Model.php');

class UserModel extends Model
{
    public function getUserPassword($user){
    	$query = "SELECT u.user_password FROM USER AS u
    			WHERE u.username LIKE '{$user}'";
    	
    	return parent::executeQueryAndReturnTable($query, array('user_password'));
    }
    
    public function getAllUsers(){
    	$query = "SELECT u.username FROM USER AS u";
    	
    	return parent::executeQueryAndReturnTable($query, array('username'));
    }
    
    public function createUser($username, $password){
    	$query = "INSERT INTO USER (username, user_password, join_date) VALUES ('{$username}','{$password}',now())";
    	
    	parent::executeQuery($query);
    }
}
