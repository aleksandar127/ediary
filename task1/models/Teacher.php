<?php

class Teacher{

    public static function get_all_students(){
        $query = DB::$conn->prepare('select * from students');
        $query->execute();
        $students = $query->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    public static function get_all_subjects(){
        $query = DB::$conn->prepare('select * from subjects');
        $query->execute();
        $subjects = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subjects;
    }

    public static function get_all_parents(){
        $query = DB::$conn->prepare('select users.id, users.first_name, users.last_name, users.role_id from users where users.role_id=5;');
        $query->execute();
        $parents = $query->fetchAll(PDO::FETCH_ASSOC);
        return $parents;
    }
}




?>