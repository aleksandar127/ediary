<?php 


class BaseAdminController 
{

	public function __construct($demand)
	{
		$this->demand = $demand;
		
	}
	public function index()
	{
		$view = new View();
		$view->load_view('admin', 'pages', 'home');

	}

	public function users()
	{
		$view = new View();
		$all_users = Users::get_all_users();
		$view->data['users'] = $all_users;
		$view->load_view('admin', 'pages', 'users');

	}

	public function edit_user()
	{	
		$view = new View();
		$user_id = $this->demand->parts_of_url[5];
		$spec_user = Users::get_user_by_id($user_id);
		$roles = Users::all_roles();
		$view->data['user'] = $spec_user;
		$view->data['roles'] = $roles;
		$view->load_view('admin', 'pages', 'edit_users');
	}

	public function save_update()
	{
		$user_id = $this->demand->parts_of_url[5];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role_id'];
		$edit_user = Users::edit($first_name, $last_name, $username, $password, $role, $user_id);
		if ($edit_user) {
			header('Location: http://localhost/eDiary/task1/admin/users');
		}

	}

	public function delete_user()
	{
		$user_id = $this->demand->parts_of_url[5];
		$delete_user = Users::delete($user_id);
		if ($delete_user) {
			header('Location: http://localhost/eDiary/task1/admin/users');
		} else {
			echo 'ne radi brisanje u bazi';
		}
		// echo 'brisi ovog korisnika';
	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();
		
	}


	public function add_user()
	{
		$view = new View();
		$roles = Users::all_roles();
		$view->data['roles'] = $roles;
		$view->load_view('admin', 'pages', 'add_user');
	}

	public function save_user()
	{
		echo 'sacuvaj sad usera';
		var_dump($_POST);
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role_id'];

		$add_new_user = Users::add_new_user($first_name, $last_name, $username, $password, $role);
	}
}