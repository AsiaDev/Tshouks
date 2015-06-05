<?php
require_once ('ConnectionHandler.php');
class Model {
	public function executeQueryAndReturnTable($query, $attributes, $withLimit = true) {
		if ($withLimit) {
			$query .= " LIMIT {$GLOBALS['limit']} OFFSET {$GLOBALS['offset']}";
		}
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
		$result = $statement->get_result ();
		
		
		if (! $result) {
			throw new Exception ( $statement->error );
		}
		
		$table = array ();
		$i = 0;
		while ( $row = $result->fetch_object () ) {
			foreach ( $attributes as $attribute ) {
				$table [$i] [] = $row->$attribute;
			}
			$i += 1;
		}
		return $table;
	}
	
	public function executeQuery($query) {
		$query = htmlspecialchars($query);
		$statement = ConnectionHandler::getConnection ()->prepare ($query);
		
		echo "<--{$query}-->";
		
		if (!$statement->execute()) {
			throw new Exception ( $statement->error );
		}
	}
}
