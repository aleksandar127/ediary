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
}




?>