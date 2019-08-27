<?php

class Professor
{
    
    public static function index(){
        $query = DB::$conn->prepare('select id,name from class where users_id=?');
        $query->execute([$_COOKIE['id']]); 
        $class = $query->fetch(PDO::FETCH_ASSOC);
        return $class;

    }

    public static function all_professors()
    {
        $query = DB::$conn->prepare('select * from users where roles_id=?');
        $query->execute([1]); 
        $professors = $query->fetchAll(PDO::FETCH_ASSOC);
        return $professors;
    }

    public static function class(){
       
        $query = DB::$conn->prepare('Select class.id,class.name from class join users_has_class on class.id=users_has_class.class_id join users on users.id=users_has_class.users_id where users.id=? ');
        $query->execute([$_COOKIE['id']]); 
        $classes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    public static function get_diary($class_id)
    {
        
        $query = DB::$conn->prepare('Select class.id as class_id,students.id,students.first_name,students.last_name,subjects_has_grades.grades,subjects_has_grades_has_students.id as mark from students join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id join subjects_has_grades on 
        subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id join class on class.id=students.class_id where  subjects.users_id=? and students.class_id=?
        union
        Select class.id as class_id,students.id,students.first_name,students.last_name,subjects_has_grades.grades,subjects_has_grades_has_students.id as mark from students left join subjects_has_grades_has_students on students.id=subjects_has_grades_has_students.students_id left join subjects_has_grades on 
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
        return $subject['id'];
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

    public static function new_grade($id, $subject_id, $grade){
        $query = DB::$conn->prepare('SELECT id from subjects_has_grades where subjects_id=? and grades=? limit 1');
        $query->execute([$subject_id,$grade]);
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        $subject_grade_id=$subject['id'];
        
        $query = DB::$conn->prepare('insert into subjects_has_grades_has_students  (students_id,subjects_has_grades_id) values (?,?)');
        $grade=$query->execute([$id,$subject_grade_id]); 
        return $grade;
    }
    public static function final_grade($id, $subject_id, $grade){
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

   public static function final_grades_show($subject_id,$class_id){

    $query = DB::$conn->prepare('SELECT final_grade.student_id,subjects_has_grades.grades from final_grade join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade join students on students.id=final_grade.student_id  where subjects_has_grades.subjects_id=?  and students.class_id=?');
    $query->execute([$subject_id,$class_id]);
    $final_grades = $query->fetchAll(PDO::FETCH_ASSOC);
    return $final_grades;

   }

    public static function open(){
    $query = DB::$conn->prepare('SELECT users.last_name,users.first_name,users_has_open.users_id as parent_id,users_has_open.id as user_open_id,open.id as open_id,open.time,users_has_open.accepted  FROM `users_has_open` join open on open.id=users_has_open.open_id join users on users.id=open.users_id WHERE open.users_id=? order by accepted');
    $query->execute([$_COOKIE['id']]);
    $open_doors = $query->fetchAll(PDO::FETCH_ASSOC);
    return $open_doors;

   }

   public static function open_yes($id){
    $query = DB::$conn->prepare('update users_has_open set accepted=1 where id=?');
    $query->execute([$id]);
   }


   public static function open_no($id){
    $query = DB::$conn->prepare('update users_has_open set accepted=2 where id=?');
    $query->execute([$id]);
   }

   public static function open_parents(){
    $query = DB::$conn->prepare('SELECT users.id,users.last_name,users.first_name FROM `users` join users_has_open on users.id=users_has_open.users_id order by accepted ');
    $query->execute();
    $open_parents = $query->fetchAll(PDO::FETCH_ASSOC);
    return $open_parents;
   }

   public static function schedule(){
    $query = DB::$conn->prepare('select terms.dan,terms.cas,class.name from terms join subjects on subjects.id=terms.subjects_id join users on users.id=subjects.users_id join schedule on schedule.id=terms.schedule_id join class on class.id=schedule.class_id where users.id=?');
    $query->execute([$_COOKIE['id']]);
    $schedule = $query->fetchAll(PDO::FETCH_ASSOC);
    return $schedule;
   }

   public static function get_new_messages(){
    $query = DB::$conn->prepare('select users.id as user,users.last_name,users.first_name,messages.id,messages.message,messages.date_and_time,messages.from_user from messages  join users on users.id=from_user where messages.to_user=? and is_read=0');
    $query->execute([$_COOKIE['id']]);
    $messages = $query->fetchAll(PDO::FETCH_ASSOC);
    return $messages;

   }

   public static function ajax_is_read($id){
    $query = DB::$conn->prepare('update messages set is_read=1 where id=? ');
    $query->execute([$id]);
    return $query->rowCount();

   }

   public static function parents_chat(){
    $query = DB::$conn->prepare('select users.id,users.first_name,users.last_name,students.id as students_id,students.first_name as students_first_name,students.last_name as students_last_name from users join students on users.id=students.users_id join class on class.id=students.class_id join users_has_class on users_has_class.class_id=class.id where users_has_class.users_id=?');
    $query->execute([$_COOKIE['id']]);
    $parents = $query->fetchAll(PDO::FETCH_ASSOC);
    return $parents;

   }

   public static function ajax_chat($id){
    $query = DB::$conn->prepare('select * from messages where (from_user=? and to_user=?) or (from_user=? and to_user=?) order by date_and_time desc');
    $query->execute([$_COOKIE['id'],$id,$id,$_COOKIE['id']]);
    $parents = $query->fetchAll(PDO::FETCH_ASSOC);
    return $parents;

   }



   public static function ajax_send_message($message,$id){
    $query = DB::$conn->prepare('insert into messages (message,from_user,to_user) values (?,?,?) ');
    $query->execute([$message,$_COOKIE['id'],$id]);
    return true;

   }

   public static function success($student_id){
    $query = DB::$conn->prepare('SELECT students.id,students.last_name,students.first_name,subjects.name,subjects_has_grades.grades  from students join final_grade on final_grade.student_id=students.id join subjects_has_grades on subjects_has_grades.id=final_grade.subject_grade  join subjects on subjects.id=subjects_has_grades.subjects_id  where students.id=?');
    $query->execute([$student_id]);
    $grades = $query->fetchAll(PDO::FETCH_ASSOC);
    return $grades;

   }

  
  
  





}