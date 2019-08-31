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
        $get_students =  Teacher::get_all_students();
        $view->data['students'] = $get_students;
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $listaOcena = Teacher::grade_listing();
        $view->data['listings'] = $listaOcena;

        var_dump($get_students);

        
        $view->load_view('teacher', 'pages', 'grade');
    }

    // public function listing_grade(){
    //     $name_students = $_POST['first_name'];
    //     $last_name_students = $_POST['last_name'];
    //     $subjects_id = $_POST['id_subjects'];
    //     $grades = $_POST['grade'];
    //     $subjects_and_grades = Teacher::get_id_subjects_grade($subjects_id, $grades);
    //     $subject_grades['subjects_id'] =  $subjects_and_grades;	
    //    $listaOcena = Teacher::grade_listing($students_id, $subjects_id);;
    // }

    public function message(){
        $view = new View();
        $all_class = Teacher::get_class();
        $view->data['class'] = $all_class;
        $child = Teacher::get_name_child();
        $view->data['child'] = $child;
        $view->load_view('teacher', 'pages', 'message');
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
            header('Location: http://localhost/eDiary1/task1/teacher/grade?success=Uspesno  uneta ocena!');
            
        }else{
            header('Location:http://localhost/eDiary1/task1/teacher/new_grade?err=Ocena nije uneta!');
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
            header('Location: http://localhost/eDiary1/task1/teacher/grade?success=Uspesno obrisana ocena!');
        }else{
            header('Location:http://localhost/eDiary1/task1/teacher/new_grade?err=Ocena nije obrisana! ');
        }
    }

    

    

    


















    public function logout(){
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary1/task1/');
		die();	
	}
}