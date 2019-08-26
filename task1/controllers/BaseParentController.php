<?php 

class BaseParentController 
{
//aca
    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	public function index()
	{
        $view = new View();
        $grades = Parents::index();
		$view->data['grades'] = $grades;	
		$view->load_view('parent', 'pages', 'home');

	}


    public function logout()
	{
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die();
		
	}






	
}