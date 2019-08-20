<?php

class Director{

    public static function nameDir(){
        
       
        $query = DB::$conn->prepare('Select first_name, last_name from users where id=? ');
        $query->execute([$_COOKIE['id']]); 
        $dir_name = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dir_name;
      
}
    public function clasName(){
        $query = DB::$conn->prepare('Select class.name, subjects.name from class,subjects where class.name = 1');
        $query->execute([$_COOKIE['id']]); 
        $classesName = $query->fetchAll(PDO::FETCH_ASSOC);
          //var_dump($classesName);
        return $classesName;
    }

    
}