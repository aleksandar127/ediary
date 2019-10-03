<?php 

require_once('Active.php');


$name = $_POST['name'];
$data = Active::find_by_name($name);
echo json_encode($data);


?>