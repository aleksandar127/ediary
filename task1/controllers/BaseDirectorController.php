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
		//$all_classes = Director::class();
		//$view->data['classes'] = $all_classes;
		$view->load_view('director', 'pages', 'welcome');

	}
	
}