<?php

class Parents{

    public static function index(){
        $query = DB::$conn->prepare('SELECT students.first_name,students.last_name,subjects.name,subjects_has_grades.grades from students join subjects_has_grades_has_students on subjects_has_grades_has_students.students_id=students.id join subjects_has_grades on subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id
        WHERE students.users_id=?');
        $query->execute([$_COOKIE['id']]); 
        $Subjects_and_grades = $query->fetchAll(PDO::FETCH_ASSOC);
        return $Subjects_and_grades;

    }



























}

?>