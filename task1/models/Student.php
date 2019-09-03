<?php 

class Student
{

   //get final grades
   public static function success($student_id){
    $query = DB::$conn->prepare('SELECT students.id,students.last_name,students.first_name,subjects.name,subjects_has_grades.grades  from students join final_grade on final_grade.student_id=students.id join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade  join subjects on subjects.id=subjects_has_grades.subjects_id  where students.id=?');
    $query->execute([$student_id]);
    $grades = $query->fetchAll(PDO::FETCH_ASSOC);
    return $grades;

   }

   
   public static function get_student(){
    $query = DB::$conn->prepare('SELECT students.first_name,students.last_name,subjects.name,subjects_has_grades.grades from students join subjects_has_grades_has_students on subjects_has_grades_has_students.students_id=students.id join subjects_has_grades on subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id
    WHERE students.users_id=? order by first_name');
    $query->execute([$_COOKIE['id']]); 
    $Subjects_and_grades = $query->fetchAll(PDO::FETCH_ASSOC);
    return $Subjects_and_grades;

}



}