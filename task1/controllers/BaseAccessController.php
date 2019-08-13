<?php 


class BaseAccessController 
{	
	private $allowed_roles = array('admin', 'director', 'professor', 'teacher', 'parent');

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
			$hash = hash('md5', microtime());
			$user_id = $user['id'];
			$cookie_id = setcookie('id', $user_id, time() + 84000, "/"); 
			$cookie_hash = setcookie('loginhash', $hash, time() + 84000, "/");

			$user_model = Users::set_user_cookie($hash, $user_id);

			header('Location: http://localhost/eDiary/task1/'.$user['role_name']);

		} else {
			header('Location: http://localhost/eDiary/task1/access?err=Wrong Credentials!');
			
		}
	}

	public static function logout($id, $hash)
	{

	 setcookie ('id', $id, time() - 3600, "/");
	 setcookie ('loginhash', $hash, time() - 3600, "/");
		
	}
	
	
}