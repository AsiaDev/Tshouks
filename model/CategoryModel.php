<?php

require_once('lib/Model.php');

class CategoryModel extends Model
{
    protected $tableName = 'category';

    public function getAllCategory() {    	
    	$query = "SELECT category FROM $this->tableName";
    	
    	return parent::executeQueryAndReturnTable($query, array('category'));
    }
}
