<?php 


class BaseAccessController
{
	public function __construct()
	{
		$view = new View();
		$view->load_view('access', 'screen', 'formlog');
	}
}