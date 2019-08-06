<?php 

class Router
{

	private $demand;

	public function __construct($demand)
	{
		$this->demand = $demand;
		var_dump($demand);

		$controller = $this->demand->parts_of_url[0];
		var_dump($controller);

	}


}