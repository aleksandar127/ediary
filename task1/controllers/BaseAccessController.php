<?php 


class BaseAccessController extends MainLogicController
{
	public function __construct($demand)
	{
		$this->logic($demand);
	
	}

	public function index()
	{
	    $view = new View();
		$view->load_view('access', 'screen', 'formlog');
	}
}