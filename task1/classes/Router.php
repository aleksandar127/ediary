<?php 

class Router
{
	//declared propery demand, to allow access to parts od demand class	
	private $demand;
	//property as name says, array of allowed routes for different users, using below to  check does controller exists in our controllers at all
	private $allowed_routes = array('admin', 'director', 'professor', 'teacher', 'parent');
	
	public function __construct($demand)
	{
		//taking first part of url from demand, that thing that we did in unpacking get, and setting if u hit route that does not have anything in url except the path of our project, controller is going to be ACCESS, and method is going to be INDEX
		$this->demand = $demand;
		var_dump($this->demand->parts_of_url);

		$controller_url_demand = $this->demand->parts_of_url[3];
		
		if ($controller_url_demand == "" || $controller_url_demand == "access") {
			$controller = $this->pullInController('access');


			//here we have to check is there key no.4 in our array parts_of_url, cause its going to give us a notice if we don't write this part of code, so IF ITS NOT IN URL EXCEPT 'TASK1', THIS PART OF CODE IS GOING TO SET CONTROLLER AS ACCESS SCREEN AND METHOD AS INDEX, IF IN URL IS ONLY ACCESS, METHOD IS GOING TO BE INDEX ALSO
			if (!array_key_exists('4', $this->demand->parts_of_url) || $this->demand->parts_of_url[4] == "") {
				$method = 'index';
			} else {
				$method =  $this->demand->parts_of_url[4];	
			}
			
			//call method if its part of class
			if (method_exists($controller, $method)) {
				$controller->$method();	
			} else {
				var_dump('method ' . $method . ' jos uvek nije definisan');
			}
			
						//and logic for other controllers,not access
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
			echo "nemaaaaas ovaj kontroler"; //there is going to be error page
		}
		// var_dump($method);
		// echo "<br>";
		// var_dump($controller);
	}
	
	public function pullInController($controller_url_demand)
	{
		$controllerName = 'Base' . ucfirst($controller_url_demand) . 'Controller';
		return new $controllerName($this->demand);
	}
	
	
}