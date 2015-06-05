<?php
class ChangeJokeBuilder extends Builder {
	
	public function __construct(){
	}
	
	public function build(){
		$view = new View('createNewJokeContent', array(
				'edit_type' => 'Neuer Witz erstellen',
				'edit_type_subtitle' => 'Neuer Witz',
				'edit_message' => 'Schreibe einen Witz in die Textbox und wähle eine Kategorie aus, in der dieser Witz am besten passt. Danach kilcke auf "Witz erstellen" um diesen Witz zu posten.',
				'action'=> 'http://btabib.dev.bbc-projects.ch/CreateNewJoke/Create',
				'joke' => ''
		));
		$view->display();

		return $this->buildEndPart("Witz erstellen");
	}
	
	public function buildUpdate($id_joke, $joke){
		$view = new View ('createNewJokeContent', array(
				'edit_type' => 'Witz bearbeiten',
				'edit_type_subtitle' => 'Bearbeitung',
				'edit_message' => 'Ändere den Witz und wähl die Kategorie aus. <b>Die Kategorie muss neu ausgewählt, da die aktuelle nicht beim ändern angezeigt wird!</b>',
				'action' => "http://btabib.dev.bbc-projects.ch/Update/update/{$id_joke}",
				'joke' => $joke
		));
		$view->display();
		
		return $this->buildEndPart("Witz ändern");
	}
	
	private function buildEndPart($value){
		require_once('./model/CategoryModel.php');
		
		$categoryModel = new CategoryModel();
		$categories = $categoryModel->getAllCategory();
		
		$result = '';
		
		foreach ($categories as $category){
			$result .= "<option>{$category[0]}</option>";
		}
		
		return $result . "<input type='submit' name='submit' value='{$value}'></select></form></div></div>";
	}
}