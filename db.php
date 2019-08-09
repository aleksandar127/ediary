<?php 
include "dbconst.php";//doesn't metter for now
class DB {

   
    public static $con;
    //for each instance this class have connection with database
    public function __construct(){
        $this->connect();
    }

    public function connect(){

        try{

            self::$con = new PDO('mysql: host=localhost; dbname=diary','root','');
            self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			print_r(PDO::getAvailableDrivers());
        }catch(PDOException $e){
			echo 'Database connection has failed. Contact system administrator to resolve this issue!<br>';
			$e->getMessage();

        }

	}
}
//DB::$con; - we can access through this static field 
//$db = new DB(); - just check



  
 

 
 


