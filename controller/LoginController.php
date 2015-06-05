<?php
class LoginController{
	
	public function __construct()
	{
		$view = new View('header', array('title' => 'Anmelden'));
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
		
		require_once('./model/UserModel.php');
		$userModel = new UserModel();
		
		if ($userModel->getUserPassword($_POST['username'])[0][0] == $_POST['_password']){
			echo "login succesfull";
			
			$_SESSION['loggedIn'] = true;
			$_SESSION['username'] = $_POST['username'];
			
			header('Location: http://btabib.dev.bbc-projects.ch/');
			
		}
		else{
			header ("Location: http://btabib.dev.bbc-projects.ch/Login/failed");
		}
		
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
	}
	
	public function failed(){
		$messageBuilder = new MessageBuilder();
		$messageBuilder->loginFailedWrongPassword();
	}
	
	public function __destruct()
	{
		$view = new View('footer');
		$view->display();
	}
	
}