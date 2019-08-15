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
		$view->data['user'] = $spec_user;
		var_dump($view->data['user']);
		// $edit_user = Users::edit($user_id);
		$view->load_view('admin', 'pages', 'edit_users');
		echo 'edituj ovog korisnika';
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
		// var_dump($_COOKIE);
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();
		
	}
}