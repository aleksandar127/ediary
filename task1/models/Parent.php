<?php

class Parents{

    public static function index(){
        $query = DB::$conn->prepare('SELECT students.first_name,students.last_name,subjects.name,subjects_has_grades.grades from students join subjects_has_grades_has_students on subjects_has_grades_has_students.students_id=students.id join subjects_has_grades on subjects_has_grades.id=subjects_has_grades_has_students.subjects_has_grades_id join subjects on subjects.id=subjects_has_grades.subjects_id
        WHERE students.users_id=? order by first_name');
        $query->execute([$_COOKIE['id']]); 
        $Subjects_and_grades = $query->fetchAll(PDO::FETCH_ASSOC);
        return $Subjects_and_grades;

    }

    public static function get_new_messages(){
        $query = DB::$conn->prepare('select users.id as user,users.last_name,users.first_name,messages.id,messages.message,messages.date_and_time,messages.from_user from messages  join users on users.id=from_user where messages.to_user=? and is_read=0');
        $query->execute([$_COOKIE['id']]);
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    
       }
    
       public static function ajax_is_read($id){
        $query = DB::$conn->prepare('update messages set is_read=1 where id=? limit 1');
        $query->execute([$id]);
        return $query->rowCount();
    
       }
    
       public static function parents_chat(){
        $query = DB::$conn->prepare('SELECT distinct users.id,users.first_name,users.last_name from users join subjects on users.id=subjects.users_id join users_has_class on users_has_class.users_id=users.id join class on class.id=users_has_class.class_id join students on students.class_id=class.id where students.users_id=?');
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


























}

?>