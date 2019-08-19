<?php 

class BaseProfessorController 
{
    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	public function index()
	{
		$view = new View();
		$view->load_view('professor', 'pages', 'home');

	}
	public function diary()
	{
		$view = new View();
		$all_classes = Professor::class();
		$view->data['classes'] = $all_classes;
		$view->load_view('professor', 'pages', 'diary');

	}
	
	public function diaryof(){
		$view = new View();
		$class_id = $this->demand->parts_of_url[5];
		$students=Professor::get_diary($class_id);
		$view->data['diaries'] = $students;
		$view->data['subject_id']=Professor::get_subject_id();
		$subject_id=$view->data['subject_id'];
		$view->data['final']=Professor::final_grades_show($subject_id,$class_id);
		$view->load_view('professor', 'pages', 'diaryof');
	}

	public function delete(){
		$id = $this->demand->parts_of_url[5];
		$deleted=Professor::delete($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $deleted;
	}

	public function edit(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$edited=Professor::edit($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $edited;
	}

	public function new_grade(){
		$id = $this->demand->parts_of_url[5];
		$new_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Professor::new_grade($id,$subject_id,$new_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		return $grade;
	}

	public function final_grade(){
		$id = $this->demand->parts_of_url[5];
		$final_grade = $this->demand->parts_of_url[7];
		$subject_id=$this->demand->parts_of_url[6];
		$grade=Professor::final_grade($id,$subject_id,$final_grade);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		
		return $grade;
	}

	public function open(){
		$view = new View();
		$open_doors=Professor::open();
		$view->data['open'] = $open_doors;
		$view->load_view('professor', 'pages', 'open');

	}

	public function open_yes(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=Professor::open_yes($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}

	public function open_no(){
		$id = $this->demand->parts_of_url[5];
		$open_doors=Professor::open_no($id);
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		

	}




}