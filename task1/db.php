<?php 


class DB {

    public static $conn;


    public function __construct(){
        $this->connect();
    }

    public function connect(){

        try{
            
            self::$conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8mb4', DBUSERNAME, DBPASS);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo 'connected successfuly';
        }catch(PDOException $e){
			echo 'Database connection has failed. Contact system administrator to resolve this issue!<br>';
			$e->getMessage();
        }
	}
}


?>

  
 

 
 


