<?php 
include "dbconst.php";
class DB {

   
    public static $con;

    public function __construct(){
        $this->connect();
    }

    public function connect(){

        try{

            self::$con = new PDO('mysql: host=localhost; dbname=schooldiary','root','');
            self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//print_r(PDO::getAvailableDrivers());
        }catch(PDOException $e){
			echo 'Database connection has failed. Contact system administrator to resolve this issue!<br>';
			$e->getMessage();

        }

	}
}




  
 

 
 


