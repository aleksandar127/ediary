<?php 

class BaseDirectorController
{

    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	public function index()
	{
		$view = new View();
		$view->load_view('director', 'pages', 'home');
	}
	

	public function avgclass() {

		$view = new View();
		$grades = Grades::average_class_grades($_GET['class'], $_GET['high_low']);
		$view->data['grades'] = $grades;
		$view->data['class'] = $_GET['class'];
		
		$view->load_view('director', 'pages', 'avgclass');
	}


	public function avgschool() {

		$view = new View();
		$grades = Grades::average_school_grades();
		$view->data['grades'] = $grades;
		$view->load_view('director', 'pages', 'avgschool');
	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
		
	}
}