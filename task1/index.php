<?php 
//by .htaccess all app works through this page (index.php), conn to db, all controllers, models and views are included here, and our index.php page is something like strait part of 'funnel' in this project. I instantiate demand and router classes, demand looks whats up in get and post requests and send it to router, where is logic for branching of futher logic, depending for which user it is (admin, director, parent...).
session_start();

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
$view = new View();