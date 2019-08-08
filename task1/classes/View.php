<?php 

class View
{
	public $data = array();

	public function load_view($dir_name, $subdir_name, $file_name)
	{

		require('./views/'.$dir_name.'/includes/header.php');
		require('./views/'.$dir_name.'/'.$subdir_name.'/'.$file_name.'.php');
		require('./views/'.$dir_name.'/includes/footer.php');
		
	}
}