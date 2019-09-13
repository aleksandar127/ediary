<?php 

class Student
{
    //method for getting students by class
    public static function get_student_by_id($student_id)
    {
        $query = DB::$conn->prepare('select st.id, st.first_name as student_name, st.last_name as student_surname, st.class_id, st.users_id, users.first_name as parent_name, users.last_name as parent_surname, class.name as class_name from students as st join users on st.users_id = users.id join class on st.class_id = class.id where st.id = ?');
        $query->execute([$student_id]);
        $student = $query->fetch(PDO::FETCH_ASSOC);
        return $student;
    }

    //method for getting students by class
    public static function get_students_by_class($class_id)
    {
        $query = DB::$conn->prepare('select st.id, st.first_name as student_name, st.last_name as student_surname, st.class_id, st.users_id, users.first_name as parent_name, users.last_name as parent_surname, class.name as class_name from students as st join users on st.users_id = users.id join class on st.class_id = class.id where class_id = ?');
        $query->execute([$class_id]);
        $students = $query->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

   //get final grades
   public static function success($student_id){
        $query = DB::$conn->prepare('SELECT students.id,students.last_name,students.first_name,subjects.name,subjects_has_grades.grades  from students join final_grade on final_grade.student_id=students.id join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade  join subjects on subjects.id=subjects_has_grades.subjects_id  where students.id=?');
        $query->execute([$student_id]);
        $grades = $query->fetchAll(PDO::FETCH_ASSOC);
        return $grades;

    }

   
   public static function get_student(){
        $query = DB::$conn->prepare('SELECT students.first_name,students.last_name,subjects.name,subjects_has_grades.grades from students join subjects_has_grades_has_students on subjects_has_grades_has_students.students_id=students.id join subjects_has_grades on subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id
        WHERE students.users_id=? order by first_name,subjects.name');
        $query->execute([$_COOKIE['id']]); 
        $subjects_and_grades = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subjects_and_grades;

    }

    public static function get_child_student(){
        $query = DB::$conn->prepare('SELECT students.id,students.first_name,students.last_name from students
        WHERE students.users_id=?');
        $query->execute([$_COOKIE['id']]); 
        $childs = $query->fetchAll(PDO::FETCH_ASSOC);
        return $childs;

    }



}