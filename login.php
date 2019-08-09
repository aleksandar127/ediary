<?php
require "db.php";
session_start();

$user = $_POST["username"];
$pass = $_POST["password"];
echo $user;





echo "</br>";
echo "skripta za logovanje";
echo "</br>";


class Users {
   public $user;
   public $pass;

   public function __construct($user, $pass)
   {
       $this->user=$user;
       $this->pass=$pass;
   }
   public function login()
   {
        $db = new DB();
        DB::$con;

    $sql = "SELECT * from parents where username = ".$this->user." and password = ".$this->pass;                     
    $query = $db->prepare($sql);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count == 1 && !empty($row)){
        $_SESSION["USERNAME"] = $row["username"];
        echo "it's ok";
    }else{
        echo"Error";
    }
  }
}
$log=new Users($user, $pass);
$log->login();