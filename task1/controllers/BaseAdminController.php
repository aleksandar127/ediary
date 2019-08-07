<?php 


class BaseAdminController
{
	private $demand = null;

	public function __construct($demand)
	{
		$this->demand = $demand;
		// var_dump($this->demand);
		$view = new View();
		$view->load_view('admin', 'pages', 'home');
	}
}