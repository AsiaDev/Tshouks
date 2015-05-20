<?php
require_once('ConnectionHandler.php');

class Model
{
    protected $tableName = null;

    public function readById($id)
    {
        $query = "SELECT * FROM $this->tableName WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($result->error);
        }

        $row = $result->fetch_object();

        $result->close();

        return $row;
    }

    public function readAll($max = 100)
    {
        $query = "SELECT * FROM $this->tableName LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($result->error);
        }
    }
    
    public function executeQueryAndReturnTable($query, $attributes){
    	$statement = ConnectionHandler::getConnection()->prepare($query);
    	 
    	if (!$statement->execute()) {
    		throw new Exception($statement->error);
    	}
    	 
    	$result = $statement->get_result();
    	if (!$result) {
    		throw new Exception($statement->error);
    	}
    	 
    	$table = array();
    	$i = 0;
    	while ($row = $result->fetch_object()) {
    		foreach ($attributes as $attribute){
    			$table[$i][] = $row->$attribute;
    		}
    		$i+=1;
    	}
    	return $table;
    }
}
