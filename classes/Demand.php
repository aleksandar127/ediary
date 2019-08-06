<?php 

class Demand
{
	public $get = array();
	public $post = array();
	public $parts_of_url;


	public function __construct()
	{
		$this->get_demand();
		$this->post_demand();
	}


	private function get_demand()
	{
		$url = $_SERVER['REQUEST_URI'];
		$this->parts_of_url;

		var_dump(explode('/', $url));
		var_dump($_GET);

	}

	private function post_demand()
	{
		foreach ($_POST as $name => $value) {
			$this->post[$name] = $value;
		}
		
	}
}