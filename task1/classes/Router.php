<?php 

class Router
{
	
	private $demand;
	private $allowed_routes = array('admin', 'director', 'professor', 'teacher', 'parent');
	
	public function __construct($demand)
	{
		$this->demand = $demand;
		var_dump($this->demand->parts_of_url);
		
		
		
		$controller_url_demand = $this->demand->parts_of_url[3];
		// var_dump($controller_url_demand);
		
		if ($controller_url_demand == "" || $controller_url_demand == "access") {
			$controller = $this->pullInController('access');
			// var_dump($controller);
			if (!array_key_exists('4', $this->demand->parts_of_url) || $this->demand->parts_of_url[4] == "") {
				echo 'ne postoji kljuc 4';
				$method = 'index';
			} else {
				$method =  $this->demand->parts_of_url[4];
				echo 'postoji';
				
			}
			
			if (method_exists($controller, $method)) {
				$controller->$method();	
			} else {
				var_dump('method ' . $method . ' jos uvek nije definisan');
			}
			
			
		} elseif (in_array($controller_url_demand, $this->allowed_routes)) {
			
			$controller = $this->pullInController($controller_url_demand);
			if($this->demand->parts_of_url[4] == ""){
				$method = 'index';
			} else {
				$method =  $this->demand->parts_of_url[4];
			}
			
			if (method_exists($controller, $method)) {
				$controller->$method();
			} else {
				var_dump('method ' . $method . ' jos uvek nije definisan');
			}
			
		} else {
			echo "nemaaaaas ovaj kontroler";
		}
		var_dump($method);
		echo "<br>";
		var_dump($controller);
	}
	
	public function pullInController($controller_url_demand)
	{
		$controllerName = 'Base' . ucfirst($controller_url_demand) . 'Controller';
		return new $controllerName($this->demand);
	}
	
	
}