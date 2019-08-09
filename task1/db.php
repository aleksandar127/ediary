<?php 

//connection database - pdo
/*try{
	$connector= new PDO('mysql:dbname=schooldiary;host=localhost','root','');
    $connector->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
	
}catch(PDOExeption $e){
	echo $e->getMessage();
	die();
}*/
//print_r(PDO::getAvailableDrivers());

class DB{

    private $host = '';
    private $dbname = '';
    private $username = '';
    private $password ='';

    

    function __construct($host, $dbname, $username, $password){

        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connect();

    }

    function connect(){

        try{

            $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//print_r(PDO::getAvailableDrivers());
        }catch(PDOException $e){
			echo 'Database connection has failed. Contact system administrator to resolve this issue!<br>';
			$e->getMessage();

        }
	}
}
$connection = new DB('localhost','schooldiary','root','');
$connection->connect();

	