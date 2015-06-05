<?php
class RegisterController{
	
	public function __construct()
	{
		$view = new View('header', array('title' => 'Registrieren'));
		$view->display();
		
		$catBuilder = new CategoriesBuilder();
		echo $catBuilder;
	}
	
	public function index(){
		
		$view = new View('registerContent');
		$view->display();
	}
	
	public function submit(){
		
		require_once('./model/UserModel.php');
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
			header("Location: http://btabib.dev.bbc-projects.ch/Login");
		}
		else{
			header("Location: http://btabib.dev.bbc-projects.ch/Register/Failure");
		}

	}
	
	public function failure(){
		$messageBuilder = new MessageBuilder();
		$messageBuilder->registerFailedUsedUsername();
	}
	
	public function __destruct()
	{
		$rightColumnBuilder = new RightColumnBuilder();
		echo $rightColumnBuilder;
		$view = new View('footer');
		$view->display();
	}
}