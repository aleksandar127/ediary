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
		// $enc_pass = password_hash($password, PASSWORD_BCRYPT);
		
		$user_model = new Users();
		$user = $user_model->get_user_by_username_pass($username, $password);

		var_dump($user);
		
		if($user){
			// echo 'slaze se sa bazom ime i sifra';
			$hash = hash('md5', microtime());
			$user_id = $user['id'];
			$cookie_id = setcookie('id', $user_id, time() + 84000, "/"); 
			$cookie_hash = setcookie('loginhash', $hash, time() + 84000, "/");

			$set_cookie = Users::set_user_cookie($hash, $user_id);
			
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