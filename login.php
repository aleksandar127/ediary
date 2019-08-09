<?php


$user = $_POST["username"];
$pass = $_POST["password"];
echo $user;
$log=new Users($user, $pass);
$log->login();




echo "</br>";
echo "skripta za logovanje";
echo "</br>";

require "task1/db.php";
session_start();
class Users
{
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

    $sql = "SELECT * from students where username = ".$this->user." and password = ".$this->pass;                     
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