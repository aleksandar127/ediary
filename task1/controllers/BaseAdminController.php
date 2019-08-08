<?php 


class BaseAdminController extends MainLogicController
{

	public function __construct($demand)
	{
		$this->logic($demand);
		$view = new View();
		$view->load_view('admin', 'pages', 'home');
	}
}