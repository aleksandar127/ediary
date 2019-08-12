<?php 


class BaseAccessController 
{	
	public function __construct()
	{
		$view = new View();
		$view->load_view('access', 'screen', 'formlog');
		
	}

	public function index()
	{
	   var_dump('hahaah index je u pitanu');
	}

	public function login()
	{
		$username = $_POST['login_username'];
		$password = $_POST['login_password'];

		$user_model = new Users();
		$logging = $user_model->login_user($username, $password);

		if($logging){
			echo 'slaze se sa bazom ime i sifra';
		} else {
			echo 'NE slaze se sa bazom ime i sifra';
		}
	}

	public function acid()
	{
		var_dump('acidovanje');
	}


}