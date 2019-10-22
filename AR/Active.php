<?php 
require_once 'activerecord\ActiveRecord.php';

 ActiveRecord\Config::initialize(function($cfg)
	 {
	     $cfg->set_model_directory('models');
	     $cfg->set_connections(array(
	         'development' => 'mysql://root:@localhost/primaryschool'));
	 });



class Active extends ActiveRecord\Model {

	static $table = 'arp';



public static function createUser($attr)
{	
	$attributes = ['name' => $attr[0], 'email' => $attr[1]];
	$newUser = new Active($attributes);
	$newUser->save();
	header('Location: index.php');
	die();
}


public static function findAll()
{
	$users = Active::find('all');
	return $users;
}



public static function updateUser($id, $name){
	$user = Active::find([$id]);
	$user->name = $name;
	$user->save();
	header('Location: index.php');
	die();
}


public static function deleteUser($id)
{
	$delete = Active::find([$id]);
	$delete->delete();
	header('Location: index.php');
	die();
}



}

?>


<!-- https://www.phpactiverecord.xyz/projects/main/wiki/Basic_CRUD/ -->