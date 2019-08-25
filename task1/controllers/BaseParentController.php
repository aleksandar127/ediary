<?php 

class BaseParentController 
{

    public function __construct($demand)
    {
		$this->demand = $demand;
		
	}
	public function index()
	{
        $view = new View();
        $grades = Parents::index(2);
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