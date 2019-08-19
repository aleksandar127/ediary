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
		$nameDirector = Director::nameDir();
		$view->data['names'] = $nameDirector;
	}
	
    
}