<?php

class Professor
{
    
    public static function diary(){}


    public static function class(){
        
       
        $query = DB::$conn->prepare('Select class.id,class.name from class join users_has_class on class.id=users_has_class.class_id join users on users.id=users_has_class.users_id where users.id=? ');
        $query->execute([$_COOKIE['id']]); 
        $classes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    public static function diaryof($class_id){

        $query = DB::$conn->prepare('Select  students.id,students.first_name,students.last_name,subjects_has_grades.grades from students join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id join subjects_has_grades on 
        subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id join class on class.id=students.class_id where  subjects.users_id=? and students.class_id=?');
        $query->execute([$_COOKIE['id'],$class_id]); 
        $class = $query->fetch(PDO::FETCH_ASSOC);
        return $class;

}




}