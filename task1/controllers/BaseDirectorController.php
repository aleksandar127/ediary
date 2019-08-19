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
		$view->load_view('director', 'pages', 'welcome');

	}
	public function diary()
	{
		$view = new View();
		$nameDirector = Director::nameDir();
		$view->data['names'] = $directorName;
		$view->load_view('director', 'pages', 'welcome');

	}
    
}