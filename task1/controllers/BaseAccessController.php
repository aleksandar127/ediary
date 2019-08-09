<?php 


class BaseAccessController 
{	
	public function __construct()
	{

		//you can see how to load from folder view login form, example, this way we are going to load each view just by writing desired names of folder,subfolder and file
		$view = new View();
		$view->load_view('access', 'screen', 'formlog');
		
	}

	public function index()
	{
	   var_dump('hahaah index je u pitanu');
	}

	public function login()
	{
		var_dump('logovanjee');
	}

	public function acid()
	{
		var_dump('acidovanje');
	}


}