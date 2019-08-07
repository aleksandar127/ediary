<?php 

class View
{
	public $data = array();

	public function load_view($dir_name, $subdir_name, $file_name)
	{

					require('./views/'.$dir_name.'/includes/header.php');
					require('./views/'.$dir_name.'/'.$subdir_name.'/'.$file_name.'.php');
					require('./views/'.$dir_name.'/includes/footer.php');
		// $allowed_views = array('admin', 'director', 'professor', 'teacher', 'parent');
		// foreach ($allowed_views as $key => $value) {
		// 	switch ($value) {
		// 		case 'admin':
				
		// 			break;
				
		// 		case 'professor':
		// 			// echo "isidoraaaaaaaaaaaaaaaaaaaaaa";
		// 			echo "<br>";
		// 			break;
				
		// 		default:
		// 			# code...
		// 			break;
		// 	}
		// }

		
	}
}