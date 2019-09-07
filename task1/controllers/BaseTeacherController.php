<?php 

class BaseTeacherController{
    public function __construct($demand){
		$this->demand = $demand;
	
    }
    
	public function index(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
		$all_students = Teacher::get_all_students();
        $view->data['students'] = $all_students;
        $view->load_view('teacher', 'pages', 'home');
    }

    public function grade(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $id_class = [];
        foreach ($all_class as $class ) {
            $id_class [] = $class['id'];
        }
        $get_students =  Teacher::get_all_students();
        $view->data['students'] = $get_students;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $list_gradee = Teacher::grade_listing();
        $view->data['listings'] = $list_gradee;

        $final = Teacher::show_final_grade($id_class);
        $view->data['show_final_grade'] = $final;

        echo "<pre>";
        echo " lista ZAKLJUCNIH ocena: "; var_dump($final);
        echo "</pre>";
        echo "<pre>";
        echo " lista ocena: "; var_dump($list_gradee);
        echo "</pre>";


        $view->load_view('teacher', 'pages', 'grade');
    }

    public function messages(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
		$messages = Messages::get_new_messages();
		$parents = Teacher::get_all_parents();
		$view->data['all_messages'] = $messages;
		$view->data['parents'] = $parents;
		$view->load_view('teacher', 'pages', 'messages');
    }
    
	public function ajax(){
		$messages = Messages::get_new_messages();
		echo JSON_encode($messages);
	}

	public function ajax_is_read() {
		$id = $_GET['id'];
		$messages = Messages::ajax_is_read($id);
		if ($messages)
        $response = ['response'=>true];
        
		else 
        $response = ['response'=>false];
        
        echo JSON_encode($response) ;
    }

	public function ajax_chat() {
        $id = $_GET['id'];
        $messages = Messages::ajax_chat($id);
        echo JSON_encode($messages);
    }


	public function ajax_send_message(){
		$message = htmlspecialchars(strip_tags($_GET['message']));
		$id = $_GET['id'];
		Messages::ajax_send_message($message,$id);
		$response = ['response'=>'da'];
		echo JSON_encode($response);
	}

    public function objects(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $view->load_view('teacher', 'pages', 'objects');
    }

    public function new_grade(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $id_students = $this->demand->parts_of_url[5];
        $students_id = Teacher::get_students_id($id_students);
        $view->data['id_students'] = $students_id;
        $view->load_view('teacher', 'pages', 'new_grade');
    }

    public function save_new_grade(){
        $id_students = $this->demand->parts_of_url[5];
        $name_students = $_POST['first_name'];
        $last_name_students = $_POST['last_name'];
        $subjects_id = $_POST['id_subjects'];
        $grades = $_POST['grade'];
        $subjects_and_grades = Teacher::get_id_subjects_grade($subjects_id, $grades);
        $subject_grades['subjects_id'] =  $subjects_and_grades;	

        $add_grade = Teacher::add_new_grade($id_students, $subjects_and_grades);

        if($add_grade){
            header('Location: http://localhost/eDiary/task1/teacher/grade?success=Uspesno  uneta ocena!');
            
        }else{
            header('Location:http://localhost/eDiary/task1/teacher/new_grade?err=Ocena nije uneta!');
        }
    }

    public function delete_grade(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $id_students = $this->demand->parts_of_url[5];
        $students_id = Teacher::get_students_id($id_students);
        $view->data['id_students'] = $students_id;
        $view->load_view('teacher', 'pages', 'delete_grade');
    }

    public function save_delete_grade(){
        $id_students = $this->demand->parts_of_url[5];
        $name_students = $_POST['first_name'];
        $last_name_students = $_POST['last_name'];
        $subjects_id = $_POST['id_subjects'];
        $grades = $_POST['grade'];
        $subjects_and_grades = Teacher::get_id_subjects_grade($subjects_id, $grades);
        $subject_grades['subjects_id'] =  $subjects_and_grades;

        $grede_delete = Teacher::delete($id_students, $subjects_and_grades);

        if($grede_delete){
            header('Location: http://localhost/eDiary/task1/teacher/grade?success=Uspesno obrisana ocena!');
        }else{
            header('Location:http://localhost/eDiary/task1/teacher/new_grade?err=Ocena nije obrisana! ');
        }
    }

    public function final_grade(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $id_students = $this->demand->parts_of_url[5];
        $students_id = Teacher::get_students_id($id_students);
        $view->data['id_students'] = $students_id;
        $view->load_view('teacher', 'pages', 'final_grade');
    }
    public function save_final_grade(){
        $id_students = $this->demand->parts_of_url[5];
        $name_students = $_POST['first_name'];
        $last_name_students = $_POST['last_name'];
        $subjects_id = $_POST['id_subjects'];
        $grades = $_POST['grade'];
        $subjects_and_grades = Teacher::get_id_subjects_grade($subjects_id, $grades);
        $subject_grades['subjects_id'] =  $subjects_and_grades;	

        $add_final_grade = Teacher::final_grade($id_students, $subjects_id, $subjects_and_grades );

        if($add_final_grade){
            header('Location: http://localhost/eDiary/task1/teacher/grade?success=Uspesno  zakljucena ocena!');
            
        }else{
            header('Location:http://localhost/eDiary/task1/teacher/new_grade?err=Ocena nije zakljucena!');
        }

        echo "<pre>";
        var_dump();
        echo "<pre>";
    }

    public function schedule(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
		$schedule = Schedule::get_schedule_for_teacher();
		$view->data['schedule'] = $schedule;
		$view->load_view('teacher', 'pages', 'schedule');
		

	}

    public function open(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
		$open_doors = OpenDoor::open();
		$view->data['open'] = $open_doors;
		$view->load_view('teacher', 'pages', 'open');
	}

	public function open_yes(){
		$id = $this->demand->parts_of_url[5];
		$open_doors = OpenDoor::open_yes($id);
		if(isset($_SERVER["HTTP_REFERER"])) {
			header ("Location:" . $_SERVER["HTTP_REFERER"]);
		}
	}

	public function open_no(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=OpenDoor::open_no($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}

	public function open_create(){
		$time = str_replace('T',' ',$_GET['date']);
		$time .= ":00";
		$open_create = OpenDoor::open_create($time);
		if(isset($_SERVER["HTTP_REFERER"])) {
			header ("Location: " . $_SERVER["HTTP_REFERER"]);
		}
    }

    public function logout(){
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();	
	}
}