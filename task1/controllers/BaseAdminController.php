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
		$role = $_POST['roles_id'];

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
		$professors = Professor::all_professors();
		$view->data['professors'] = $professors;
		$view->load_view('admin', 'pages', 'edit_subject');
	}

	//method for saving updates for subject
	public function save_edit()
	{
		$subject_id = $this->demand->parts_of_url[5];
		$name = $_POST['sub_name'];
		$prof_id = !empty($_POST['users_id']) ? $_POST['users_id'] : null;
		$high_low = $_POST['high_low'];

		$edit = Subjects::edit($name, $prof_id, $high_low, $subject_id);
		if ($edit) {
			header('Location: '.$_SERVER['HTTP_REFERER'].'?success=Uspešno ste izmenili informacije o predmetu!');
		} else {
			echo 'neuspesno editovanje predmeta u bazi';
		}
	}

	//method for deleting subject from db
	public function delete_sub()
	{
		$subject_id = $this->demand->parts_of_url[5];
		$delete_sub = Subjects::delete($subject_id);
		if ($delete_sub) {
			header('Location: http://localhost/eDiary/task1/admin/subjects');
		} else {
			echo 'bezuspesno brisanje predmeta predmeta u bazi';
		}
	}

	//method for adding new subject in db
	public function add_sub()
	{
		$view = new View();
		$professors = Professor::all_professors();
		$view->data['professors'] = $professors;
		$view->load_view('admin', 'pages', 'add_subject');
		
	}

	public function save_sub()
	{
		$sub_name = $_POST['subject_name'];
		$high_low = $_POST['class'];
		$professor = $_POST['prof_id'];
		$prof_id = !empty($_POST['prof_id']) ? $_POST['prof_id'] : null;
		
		
		$add_new_sub = Subjects::add_new($sub_name, $prof_id, $high_low);
		if ($add_new_sub) {
			header('Location: http://localhost/eDiary/task1/admin/add_sub?success=Uspešno ste dodali novi predmet!');
		} else {
			echo 'nesto je poslo po zlu pri dodavanju predmeta';
		}
	}

	public function classes()
	{
		$view = new View();
		$classes_low = Classes::all_classes('0');
		$classes_high = Classes::all_classes('1');
		$view->data['low_classes'] = $classes_low; 
		$view->data['high_classes'] = $classes_high;
		$view->load_view('admin', 'pages', 'classes');
	}

	public function edit_class()
	{
		$class_id = $this->demand->parts_of_url[5];
		$view = new View();
		$class = Classes::get_class_by_id($class_id);
		$view->data['class'] = $class;
		$view->load_view('admin', 'pages', 'edit_class');
	}

	public function fetch_heads()
	{
		if($_GET['high_low'] == 0){
			$role = 3;
			$teachers = Classes::get_teachers_or_profs($role);
			$teachers = json_encode($teachers);
			echo $teachers;
		} elseif($_GET['high_low'] == 1){
			$role = 1;
			$professors = Classes::get_teachers_or_profs($role);
			$professors = json_encode($professors);
			echo $professors;
		}

	}
	// validate editing class in db
	public function save_ed_cl()
	{
		$class_id = $this->demand->parts_of_url[5];
		$class_name = $_POST['class_name'];
		$high_low = $_POST['high_low'];
		$class_head = !empty($_POST['users_id']) ? $_POST['users_id'] : $_POST['current_class_head'];

		$edit = Classes::edit_class($class_name, $class_head, $high_low, $class_id);
		if ($edit) {
			header('Location: '.$_SERVER['HTTP_REFERER'].'?success=Uspešno ste izmenili informacije o odeljenju! ');
		} else {
			echo 'greska pri apdejtovanju informacija o odeljenju';
		}

	}

	public function delete_class()
	{
		$class_id = $this->demand->parts_of_url[5];
		$delete_class = Classes::delete($class_id);
		if ($delete_class) {
			header('Location: http://localhost/eDiary/task1/admin/classes');
		} else {
			echo 'ne radi brisanje odeljenja u bazi,check it out honeyh';
		}
	}

	public function add_class()
	{
		$view = new View();
		$view->load_view('admin', 'pages', 'add_class');

	}

	public function save_class()
	{
		$class_name = $_POST['name_of_class'];
		$high_low = $_POST['class'];
		$puple_name = $_POST['puple'];
		$puple_surname = $_POST['puple_surname'];
		$head_id = $_POST['prof/tec_id'];

		// PRVO RODITELJA RESITI I UPISATI U USERE DA BI DOBILAID RODITELJA
		// $enc_pass = password_hash($password , PASSWORD_BCRYPT);
		var_dump($_POST);die;
																					//id roditelja ovde
		$res = Classes::make_class($class_name, $head_id, $high_low, $puple_name, $puple_surname, '9');
		var_dump($res);
		if ($res) {
			header('Location: http://localhost/eDiary/task1/admin/add_class?success=Uspešno ste napravili novo odeljenje!');
		} else {
			echo 'nesto puca kod upisa odeljenja u bazu';
		}
	}
}