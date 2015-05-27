<?php
class RegisterController{
	
	public function __construct()
	{
		$view = new View('header', array('title' => 'Startseite', 'heading' => 'Startseite'));
		$view->display();
	}
	
	public function index(){
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		$view = new View('registerContent');
		$view->display();
		
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
	}
	
	public function submit(){
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
		
		require_once('model/UserModel.php');
		$userModel = new UserModel();
		
		$allUsers = $userModel->getAllUsers();
		
		$abortRegister = false;
		foreach ($allUsers as $username){
			if ($username[0] == $_POST['username']){
				// there is already a user named liked that
				$abortRegister = true;
				break;
			}
		}
		
		if (!$abortRegister){
			// create this new user
			$userModel->createUser($_POST['username'], $_POST['_password']);
			echo "user created";
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