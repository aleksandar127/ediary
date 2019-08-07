<?php 
//kjnjkkjbhkhhhh
///jhuhigyuftfytt
require('./db.php');	


spl_autoload_register(function($class){
	require('./controllers/'.$class.'.php');
});

foreach (glob('./models/*') as $model_name) {
	require($model_name);
}

foreach (glob('./classes/*') as $class_name) {
	require($class_name);
}


$demand = new Demand();
$router = new Router($demand);

