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

	//method for saving updates for user
	public function save_update()
	{
		$user_id = $this->demand->parts_of_url[5];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role_id'];

		$enc_pass = password_hash($password , PASSWORD_BCRYPT);

		$edit_user = Users::edit($first_name, $last_name, $username, $enc_pass, $role, $user_id);
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
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role_id'];

		$enc_pass = password_hash($password , PASSWORD_BCRYPT);

		$add_new_user = Users::add_new_user($first_name, $last_name, $username, $enc_pass, $role);
		if ($add_new_user) {
			header('Location: http://localhost/eDiary/task1/admin/add_user?success=Successfully added user!');
		} else {
			header('Location: http://localhost/eDiary/task1/admin/add_user?err=Something went wrong!');
		}
	}

	public function subjects()
	{
		$view = new View();
		$subjects_low = Subjects::all_subjects('0');
		$subjects_high = Subjects::all_subjects('1');
		$view->data['subjects_low_grades'] = $subjects_low; 
		$view->data['subjects_high_grades'] = $subjects_high; 
		$view->load_view('admin', 'pages', 'subjects');
	}

	public function edit_subject()
	{
		$subject_id = $this->demand->parts_of_url[5];
		$view = new View();
		$subject = Subjects::get_subject_by_id($subject_id);
		$view->data['subject'] = $subject;
		$view->load_view('admin', 'pages', 'edit_subject');
	}

	//method for saving updates for subject
	public function save_edit()
	{
		$subject_id = $this->demand->parts_of_url[5];
		$name = $_POST['sub_name'];
		$prof_id = !empty($_POST['users_id']) ? "'".$_POST['users_id']."'" : "null";
		var_dump($prof_id);
		$high_low = $_POST['high_low'];

		// $edit = Subjects::edit($name, $prof_id, $high_low, $subject_id);
		// var_dump($edit);
	}

}