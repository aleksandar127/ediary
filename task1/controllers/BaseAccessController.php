<?php 


class BaseAccessController 
{	

	public function index()
	{
		$view = new View();
		$view->load_view('access', 'screen', 'formlog');
	}
	
	public function login()
	{
		$username = $_POST['login_username'];
		$password = $_POST['login_password'];
		
		$user_model = new Users();
		$user = $user_model->login_user($username, $password);

		var_dump($user);
		
		if($user){
			// echo 'slaze se sa bazom ime i sifra';
			$cookie_name = $user['role_name'];
			$cookie_value = $user['password'];
			$cookie = setcookie($cookie_name, $cookie_value, time() + 84000, "/"); 
			
			

		} else {
			header('Location: http://localhost/eDiary/task1/access?err=Wrong Credentials!');
			
		}
	}
	
	
	
}