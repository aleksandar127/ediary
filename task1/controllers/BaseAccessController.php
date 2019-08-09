<?php 


class BaseAccessController 
{	
	public function __construct()
	{
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