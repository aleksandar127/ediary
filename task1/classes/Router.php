<?php 

class Router
{

	private $demand;
	private $allowed_routes = array('admin', 'director', 'professor', 'teacher', 'parent');

	public function __construct($demand)
	{
		$this->demand = $demand;
		// var_dump($this->demand->parts_of_url);



		$controller_url_demand = $this->demand->parts_of_url[3];
		// var_dump($controller_url_demand);

		if ($controller_url_demand == "") {
			$this->pullInController('access');
		} elseif (in_array($controller_url_demand, $this->allowed_routes)) {

			$this->pullInController($controller_url_demand);

		} else {
			echo "nemaaaaas ovaj kontroler";
		}
		
	}

	public function pullInController($controller_url_demand)
	{
		$controllerName = 'Base' . ucfirst($controller_url_demand) . 'Controller';
		return new $controllerName($this->demand);
	}


}