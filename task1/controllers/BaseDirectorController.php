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
		$view->load_view('director', 'pages', 'avgclass');
	}


	public function avgschool() {

		$view = new View();
		$view->load_view('director', 'pages', 'avgschool');
	}

	public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: '.URLROOT.'/');
		die();
		
	}
}