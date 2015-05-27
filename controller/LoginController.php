<?php
class LoginController{
	
	public function __construct()
	{
		$view = new View('header', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}
	
	public function index(){
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
	
		$view = new View('loginContent');
		$view->display();
	
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
	}
	
	public function submit(){
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		require_once('model/UserModel.php');
		$userModel = new UserModel();
		
		if ($userModel->getUserPassword($_POST['username'])[0][0] == $_POST['_password']){
			echo "login succesfull";
			
			$_SESSION['loggedIn'] = true;
			$_SESSION['username'] = $_POST['username'];
			
		}
		else{
			echo "login failed";
		}
		
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
	}
	
	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
	
}