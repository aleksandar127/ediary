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
	

	public function avgclass()
	{

		$view = new View();
		$grades = Grades::average_class_grades($_GET['class'], $_GET['high_low']);
		$view->data['grades'] = $grades;
		$view->data['class'] = $_GET['class'];
		
		$view->load_view('director', 'pages', 'avgclass');
	}


	// public function avgschool() 
	// {
	// 	$view = new View();
	// 	$grades = Grades::average_school_grades();
	// 	$view->data['grades'] = $grades;
	// 	$view->load_view('director', 'pages', 'avgschool');
	// }



	public function avgschool() 
	{
		$view = new View();

		$cacheFile = sprintf("views/director/pages/avgschool_cache%s.php", date("Ymd"));

		if(file_exists($cacheFile)) {

			$timediff = time() - filemtime($cacheFile);
			echo $timediff;

			if($timediff > (24)) {
				unlink($cacheFile);
				}
				else {
					$view->load_view('director', 'pages', 'avgschool_cache20190913');
 					
				}

		}
		else {
			
			$grades = Grades::average_school_grades();
			$view->data['grades'] = $grades;
			$view->load_view('director', 'pages', 'avgschool');
		}

			


		
	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
		
	}





}