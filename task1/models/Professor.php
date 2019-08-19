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

    public static function get_diary($class_id){
        
        $query = DB::$conn->prepare('Select students.id,students.first_name,students.last_name,subjects_has_grades.grades,subjects_has_grades_has_students.id as mark from students join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id join subjects_has_grades on 
        subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id join class on class.id=students.class_id where  subjects.users_id=? and students.class_id=?
        union
        Select students.id,students.first_name,students.last_name,subjects_has_grades.grades,subjects_has_grades_has_students.id as mark from students left join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id left join subjects_has_grades on 
        subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id left join subjects on subjects.id=subjects_has_grades.subjects_id left join class on class.id=students.class_id where  students.id not in(Select students.id from students join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id join subjects_has_grades on 
        subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id join class on class.id=students.class_id where  subjects.users_id=? and students.class_id=?) and  students.class_id=? order by last_name');
        $query->execute([$_COOKIE['id'],$class_id,$_COOKIE['id'],$class_id,$class_id]); 
        $class = $query->fetchAll(PDO::FETCH_ASSOC);
        return $class;

}
    public static function get_subject_id(){

        $query = DB::$conn->prepare('Select subjects.id from subjects where subjects.users_id=?');
        $query->execute([$_COOKIE['id']]); 
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        return $subject;
    }

    public static function delete($id){
        $query = DB::$conn->prepare('delete from subjects_has_grades_has_students where id=? limit 1');
        $deleted=$query->execute([$id]); 
        return $deleted;
    }
    public static function edit($id,$subject_id,$grade){
        $query = DB::$conn->prepare('select id from subjects_has_grades where subjects_id=? and grades=? limit 1');
        $query->execute([$subject_id,$grade]);
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        $subject_grade_id=$subject['id'];
        
        $query = DB::$conn->prepare('update  subjects_has_grades_has_students set subjects_has_grades_id=?  where id=? limit 1');
        $deleted=$query->execute([$subject_grade_id,$id]); 
        return $deleted;
    }

    public static function new_grade($id,$subject_id,$grade){
        $query = DB::$conn->prepare('SELECT id from subjects_has_grades where subjects_id=? and grades=? limit 1');
        $query->execute([$subject_id,$grade]);
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        $subject_grade_id=$subject['id'];
        
        $query = DB::$conn->prepare('insert into subjects_has_grades_has_students  (students_id,subjects_has_grades_id) values (?,?)');
        $grade=$query->execute([$id,$subject_grade_id]); 
        return $grade;
    }
    public static function final_grade($id,$subject_id,$grade){
        $query = DB::$conn->prepare('SELECT id from subjects_has_grades where subjects_id=? and grades=? ');
        $query->execute([$subject_id,$grade]);
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        $subject_grade_id=$subject['id'];
        $query = DB::$conn->prepare('SELECT final_grade.id from final_grade join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade  where final_grade.student_id=? and subjects_has_grades.subjects_id=?');
        $query->execute([$id, $subject_id]);
        $has_final = $query->fetch(PDO::FETCH_ASSOC);
       $final= $has_final['id'];
        if($final){
            $query = DB::$conn->prepare('update final_grade  set student_id=?,subject_grade=? where id=? limit 1');
            $grade=$query->execute([$id,$subject_grade_id,$final]); 
            return $grade;
        }
        else{ 
        $query = DB::$conn->prepare('insert into final_grade (id,student_id,subject_grade) values (null,?,?)');
        $grade=$query->execute([$id,$subject_grade_id]); 
        return $grade;
        }
    }

   public static function final_grades_show($subject_id){

    $query = DB::$conn->prepare('SELECT final_grade.student_id,subjects_has_grades.grades from final_grade join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade  where subjects_has_grades.subjects_id=?  ');
    $query->execute([$subject_id]);
    $final_grades = $query->fetch(PDO::FETCH_ASSOC);
    return $final_grades;

   }

}