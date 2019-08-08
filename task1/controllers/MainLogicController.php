<?php

class MainLogicController
{

    protected function logic($demand)
    {
        $this->demand = $demand;
        var_dump($demand);
        
        if($this->demand->parts_of_url[4] == ""){
            $method = 'index';
        } else {
            $method =  $this->demand->parts_of_url[4];
        }
    

                
        if ($this->isControllerExist()) {
            echo 'postoji';
    
        } else {
            echo 'ne postoji';
        }


        if (method_exists($controller, $method)) {
            // sta je kontroler, mozda uraditi u ruteru ovu logiku, da ne bi pozivala i ovde kontrolere! nema smisla
            $controller->$method();
        } else {
            var_dump('method ' . $method . ' jos uvek nije definisan');
        }


        
    }

    private function isControllerExist()
    {
        $controllerName = 'Base' . ucfirst($this->demand->parts_of_url[3]) . 'Controller';

        $controllers = glob('./controllers/'.$controllerName.'.php');
		if (count($controllers) > 0){
			return true;
        }
        
        return false;
    }
    
}