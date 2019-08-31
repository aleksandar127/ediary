<?php

class Messages
{

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

       public static function professor_chat(){
        $query = DB::$conn->prepare('SELECT distinct users.id,users.first_name,users.last_name,subjects.name from users join subjects on users.id=subjects.users_id join users_has_class on users_has_class.users_id=users.id join class on class.id=users_has_class.class_id join students on students.class_id=class.id where students.users_id=?
        union
        SELECT distinct users.id,users.first_name,users.last_name,role.name from users join role on role.id=users.roles_id join class on class.users_id=users.id join students on students.class_id=class.id where students.users_id=? and users.id not in(SELECT distinct users.id from users join subjects on users.id=subjects.users_id join users_has_class on users_has_class.users_id=users.id join class on class.id=users_has_class.class_id join students on students.class_id=class.id where students.users_id=?)');
        $query->execute([$_COOKIE['id'],$_COOKIE['id'],$_COOKIE['id']]);
        $parents = $query->fetchAll(PDO::FETCH_ASSOC);
        return $parents;
    
       }









}