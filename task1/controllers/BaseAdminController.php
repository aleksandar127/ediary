<?php 


class BaseAdminController 
{

	public function index()
	{
		$view = new View();
		$view->load_view('admin', 'pages', 'home');

	}

	public function logout()
	{
		// var_dump($_COOKIE);
		$access_destroy = BaseAccessController::logout($_COOKIE['id'], $_COOKIE['loginhash']);
		header('Location: http://localhost/eDiary/task1/');
		die;
		
	}
}