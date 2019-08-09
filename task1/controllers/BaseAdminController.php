<?php 


class BaseAdminController 
{

	public function __construct($demand)
	{
		// $this->logic($demand);
		$view = new View();
		$view->load_view('admin', 'pages', 'home');
	}
}