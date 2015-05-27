<?php
class CreateNewJokeBuilder extends Builder {
	
	public function build(){
		require_once('model/CategoryModel.php');
		
		$categoryModel = new CategoryModel();
		$categories = $categoryModel->getAllCategory();
		
		$view = new View('createNewJokeContent');
		$view->display();
		
		$result = '';
		
		foreach ($categories as $category){
			$result .= "<option>{$category[0]}</option>";
		}
		
		$result .= "</select></form></div></div>";
		
		return $result;
	}
}