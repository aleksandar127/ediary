<?php

class Teacher{

    public static function get_all_students(){
        $query = DB::$conn->prepare('SELECT * FROM students');
        $query->execute();
        $students = $query->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    public static function get_all_subjects(){
        $query = DB::$conn->prepare('SELECT * FROM subjects');
        $query->execute();
        $subjects = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subjects;
    }

    public static function get_all_parents(){
        $query = DB::$conn->prepare('SELECT users.id, users.first_name, users.last_name, users.role_id FROM users WHERE users.role_id=5;');
        $query->execute();
        $parents = $query->fetchAll(PDO::FETCH_ASSOC);
        return $parents;
    }

    public static function get_all_class(){

    }

    public static function get_name_child(){
        $query = DB::$conn->prepare('SELECT users.id, users.first_name, users.last_name, students.id, students.first_name AS name_students, students.last_name as last_name_students, students.users_id FROM users JOIN students ON users.id = students.users_id');
        $query->execute();
        $child = $query->fetchAll(PDO::FETCH_ASSOC);
        return $child;
    }
}




?>