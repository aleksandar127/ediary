<?php 


class BaseAdminController 
{

	//method for pulling request in this part of logic
	public function __construct($demand)
	{
		$this->demand = $demand;
		
	} 

	//default page, home page
	public function index()
	{
		$view = new View();
		$view->load_view('admin', 'pages', 'home');

	}

	//method for showing page with all users
	public function users()
	{
		$view = new View();
		$all_users = Users::get_all_users();
		$view->data['users'] = $all_users;
		$view->load_view('admin', 'pages', 'users');

	}

	//method for showing page of form for updating user in db
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
			header('Location: '.URLROOT.'/admin/users');
		}
		
	}

	//method for deleting user from db
	public function delete_user()
	{
		$user_id = $this->demand->parts_of_url[5];
		$delete_user = Users::delete($user_id);
		if ($delete_user) {
			header('Location: '.URLROOT.'/admin/users');
		} else {
			echo 'ne radi brisanje u bazi';
		}

	}

	//function for logging out admin
	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
		
	}

	//method for showing page of form for adding new user in db
	public function add_user()
	{
		$view = new View();
		$roles = Users::all_roles();
		$view->data['roles'] = $roles;
		$view->load_view('admin', 'pages', 'add_user');
		
	}

	//validating new user before storage in db
	public function save_user()
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role_id'];

		$enc_pass = password_hash($password , PASSWORD_BCRYPT);
		$username_exists = Users::get_user_by_username($username);
		
		if ($username_exists) {
			header('Location: '.URLROOT.'/admin/add_user?err=Korisnik sa ovim username-om već postoji!');
		} else {
			$add_new_user = Users::add_new_user($first_name, $last_name, $username, $enc_pass, $role);
			if ($add_new_user) {
				header('Location: '.URLROOT.'/admin/add_user?success=Uspešno ste dodali novog korisnika!');
			} else {
				header('Location: '.URLROOT.'/admin/add_user?err=Nešto je pošlo po zlu, pokušajte ponovo!');
			}
		}

	}

	//
	public function subjects()
	{
		$view = new View();
		$subjects_low = Subjects::all_subjects('0');
		$subjects_high = Subjects::all_subjects('1');
		$view->data['subjects_low_grades'] = $subjects_low; 
		$view->data['subjects_high_grades'] = $subjects_high; 
		$view->load_view('admin', 'pages', 'subjects');
	}

	//method for showing page of form for editing existing subject
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
			header('Location: '.URLROOT.'/admin/subjects');
		} else {
			echo 'bezuspesno brisanje predmeta predmeta u bazi';
		}
	}

	//method for showing page of adding new subject
	public function add_sub()
	{
		$view = new View();
		$professors = Professor::all_professors();
		$view->data['professors'] = $professors;
		$view->load_view('admin', 'pages', 'add_subject');
		
	}

	//method for saving new subject in db
	public function save_sub()
	{
		$sub_name = $_POST['subject_name'];
		$high_low = $_POST['class'];
		$professor = $_POST['prof_id'];
		$prof_id = !empty($_POST['prof_id']) ? $_POST['prof_id'] : null;
		
		
		$add_new_sub = Subjects::add_new($sub_name, $prof_id, $high_low);
		if ($add_new_sub) {
			header('Location: '.URLROOT.'/admin/add_sub?success=Uspešno ste dodali novi predmet!');
		} else {
			echo 'nesto je poslo po zlu pri dodavanju predmeta';
		}
	}

	//method for displaying all available classes
	public function classes()
	{
		$view = new View();
		$classes_low = Classes::all_classes('0');
		$classes_high = Classes::all_classes('1');
		$view->data['low_classes'] = $classes_low; 
		$view->data['high_classes'] = $classes_high;
		$view->load_view('admin', 'pages', 'classes');
	}

	//method for editing 
	public function edit_class()
	{
		$class_id = $this->demand->parts_of_url[5];
		$view = new View();
		$class = Classes::get_class_by_id($class_id);
		$view->data['class'] = $class;
		$view->load_view('admin', 'pages', 'edit_class');
	}

	//method for fetching teachers for low grade, and professors for high grade
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

	//method for deleting class from db
	public function delete_class()
	{
		$class_id = $this->demand->parts_of_url[5];
		$delete_class = Classes::delete($class_id);
		if ($delete_class) {
			header('Location: '.URLROOT.'/admin/classes');
		} else {
			echo 'ne radi brisanje odeljenja u bazi, check it out honey';
		}
	}

	//method for showing page with form for adding new class
	public function add_class()
	{
		$view = new View();
		$view->load_view('admin', 'pages', 'add_class');

	}

	//validation of class before coming-in db
	public function save_class()
	{
		$class_name = $_POST['name_of_class'];
		$high_low = $_POST['class'];
		$puple_name = $_POST['puple'];
		$puple_surname = $_POST['puple_surname'];
		$head_id = $_POST['prof/tec_id'];

		//parent of puple
		$parent_name = $_POST['parent'];
		$parent_surname = $_POST['parent_surname'];
		$parent_username = $_POST['parent_username'];
		$parent_password = $_POST['parent_pass'];
		$enc_pass = password_hash($parent_password , PASSWORD_BCRYPT);
		$parent_role = 4;

		$user = Users::get_user_by_username($parent_username);
		$class = Classes::get_class_by_name($class_name);
		if ($class_name == $class['name']) {
			header('Location: http://localhost/eDiary/task1/admin/add_class?error=Ovakvo odeljenje već postoji!');
		} elseif($parent_username == $user['username']) {
			header('Location: http://localhost/eDiary/task1/admin/add_class?error=Roditelj sa ovakvim username-om već postoji!');
		} else {
			$res = Classes::make_class($class_name, $head_id, $high_low, $parent_name, $parent_surname, $parent_username, $enc_pass, $parent_role, $puple_name, $puple_surname);
			if ($res) {
				header('Location: http://localhost/eDiary/task1/admin/add_class?success=Uspešno ste napravili novo odeljenje!');
			} else {
				echo 'nesto puca kod upisa odeljenja u bazu';
			}
		}

		
	}

	//fetching all available grades from db
	public function schedule()
	{
		$view = new View();
		$all_classes = Classes::classes_db();
		$view->data['all_classes'] = $all_classes;

		$view->load_view('admin', 'pages', 'schedule');

	}

	//function for representation schedule of spec class
	public function show_schedule()
	{
		$view = new View();

		$class_id = $this->demand->parts_of_url[5];
		$class = Classes::get_class_by_id($class_id);
		$view->data['class'] = $class;

		$view->data['counter'] = 1;
		$first_week_classes = [];
		$second_week_classes = [];
		$third_week_classes = [];
		$fourth_week_classes = [];
		$fifth_week_classes = [];
		$sixth_week_classes = [];
		$seventh_week_classes = [];

		for ($x=1; $x < 6 ; $x++) { 
		
			$schedule_by_class = Schedule::schedule_by_class($class_id, $x, 1);
			$first_week_classes[] = $schedule_by_class;

			$sec_sch = Schedule::schedule_by_class($class_id, $x, 2);
			$second_week_classes[] = $sec_sch;

			$thi_sch = Schedule::schedule_by_class($class_id, $x, 3);
			$third_week_classes[] = $thi_sch;

			$four_sch = Schedule::schedule_by_class($class_id, $x, 4);
			$fourth_week_classes[] = $four_sch;

			$fif_sch = Schedule::schedule_by_class($class_id, $x, 5);
			$fifth_week_classes[] = $fif_sch;

			$six_sch = Schedule::schedule_by_class($class_id, $x, 6);
			$sixth_week_classes[] = $six_sch;

			$sev_sch = Schedule::schedule_by_class($class_id, $x, 7);
			$seventh_week_classes[] = $sev_sch;

		}
		$view->data['first_classes'] = $first_week_classes;
		$view->data['second_classes'] = $second_week_classes;
		$view->data['third_classes'] = $third_week_classes;
		$view->data['fourth_classes'] = $fourth_week_classes;
		$view->data['fifth_classes'] = $fifth_week_classes;
		$view->data['sixth_classes'] = $sixth_week_classes;
		$view->data['seventh_classes'] = $seventh_week_classes;
		
		$view->load_view('admin', 'pages', 'show_schedule');

	}

	//method for making new schedule
	public function make_schedule()
	{
		$view = new View();

		$view->data['counter'] = 1;
		$avl_classes = Classes::classes_db();
		$view->data['available_classes'] = $avl_classes;
		$view->load_view('admin', 'pages', 'make_sch');
	}

	//function for fetching subjects from db depending of high or low grade 
	public function fetch_spec_subs()
	{
		if($_GET['high_low'] == 0){
			$low_subjects = Subjects::all_subjects($_GET['high_low']);
			$low_subjects = json_encode($low_subjects);
			echo $low_subjects;
		} elseif($_GET['high_low'] == 1){
			$high_subjects = Subjects::all_subjects($_GET['high_low']);
			$high_subjects = json_encode($high_subjects);
			echo $high_subjects;
		}
	}

	//function for checking if schedule for spec. class already exists
	public function existing_sch()
	{
		$is_exist = Schedule::schedule_exists($_GET['class_id']);
		$is_exist = json_encode($is_exist);
		echo $is_exist;	

	}

	//function for checking if lesson is occupied in specific time
	public function is_subject_occupied()
	{
		$is_subject_occupied = Schedule::is_subject_occupied($_GET['day'], $_GET['lesson_no']);
		$is_subject_occupied = json_encode($is_subject_occupied);
		echo($is_subject_occupied);
	}

	//function for storing schedule in db
	public function save_sch()
	{
		$class_id = explode(',', $_POST['class_sch'])[0];


		//shift first value of array
		$supergl = $_POST;
		$new_arr = array_shift($supergl);


				
			foreach ($supergl as $key => $value) {


				$day_in_week = substr($key, 0, -1);
				if ($day_in_week == 'monday') {
					$day_in_week = "1";
				} elseif($day_in_week == 'tuesday'){
					$day_in_week = "2";
				} elseif($day_in_week == 'wednesday'){
					$day_in_week = "3";
				} elseif($day_in_week == 'thursday'){
					$day_in_week = "4";
				} elseif($day_in_week == 'friday'){
					$day_in_week = "5";
				}
				
				$lesson_num = substr($key, -1);
				$subject_id = $value;
			

				$make_sch = Schedule::make_schedule($day_in_week, $lesson_num, $subject_id, $class_id);
				var_dump($make_sch);
				if ($make_sch) {
					header('Location: http://localhost/eDiary/task1/admin/make_schedule?success=Uspešno ste napravili raspored časova!');
				} else {
					echo 'nesto je krenulo po zlu kod pravljenja rasporeda';
				}
		
				
			}

	}


	//method for showing page of form for updating existing schedule 
	public function edit_sch()
	{
		$class_id = $this->demand->parts_of_url[5];
		$view = new View();

		$view->data['class_id'] = $class_id;
		$view->data['counter'] = 1;
		$schedule = Schedule::get_sch_by_class($class_id);

		$sch = [];
		foreach ($schedule as $value) {
			
			$subject_id = intval($value['subjects_id']);
			$high_low = intval($value['high_low']);
			$other_less = Subjects::get_specific_subs($high_low, $subject_id);
			

			//merging array of other subjects with class's existing schedule
			$other_subjects  = $value + $other_less;
			$sch[] = $other_subjects;
			$view->data['sch'] = $sch; 
		}
	
		$high_low = Classes::get_class_by_id($class_id);
		$view->data['high_low'] = $high_low['high_low'];


		$view->load_view('admin', 'pages', 'edit_schedule');
	}

	public function save_sch_update()
	{
		$sch = $_POST;
		//pull out class_id from POST superglobal
		$class_id = array_pop($sch);
		var_dump($class_id);
		var_dump($sch);

		foreach ($sch as $day_lesson => $lesson_id) {
			$day = substr($day_lesson, 0, -1);
			
			//u can use and str_replace here
			if ($day_in_week == 'monday') {
				$day_in_week = "1";
			} elseif($day_in_week == 'tuesday'){
				$day_in_week = "2";
			} elseif($day_in_week == 'wednesday'){
				$day_in_week = "3";
			} elseif($day_in_week == 'thursday'){
				$day_in_week = "4";
			} elseif($day_in_week == 'friday'){
				$day_in_week = "5";
			}
				
		}

	}
}