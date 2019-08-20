<?php 

class BaseTeacherController{
    public function __construct($demand){
		$this->demand = $demand;
	
    }
    
	public function index(){
        $view = new View();
		$all_students = Teacher::get_all_students();
        $view->data['students'] = $all_students;
        $view->load_view('teacher', 'pages', 'home');
    }

    public function subjects(){
        $view = new View();
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $view->data['students'] = Teacher::get_all_students();
        $view->load_view('teacher', 'pages', 'subjects');
    }

    public function parents(){
        $view = new View();
        $all_parents = Teacher::get_all_parents();
        $view->data['parents'] = $all_parents;
        $view->load_view('teacher', 'pages', 'chat');
    }
    public function objects(){
        $view = new View();
        $all_subjects = Teacher::get_all_subjects();
        $view->data['subjects'] = $all_subjects;
        $view->load_view('teacher', 'pages', 'objects');
    }
}