<?php 

class Subjects
{
    public static function all_subjects($grade)
    {
        $query = DB::$conn->prepare('select s.id, s.name, s.users_id, s.high_low, users.first_name, users.last_name from subjects as s left join users on s.users_id = users.id where high_low=?');
        $query->execute([$grade]); 
        $subjects = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subjects;
    }

    public static function get_subject_by_id($id)
    {
        $query = DB::$conn->prepare('select s.id, s.name, s.users_id, s.high_low, users.first_name, users.last_name from subjects as s left join users on s.users_id = users.id where s.id=?');
        $query->execute([$id]); 
        $subject = $query->fetch(PDO::FETCH_ASSOC);
        return $subject;
    }

    public static function edit($name, $prof_id, $high_low, $id)
    {
        $query = 'update subjects set name=?, users_id=?, high_low=? where id=?';
        $res=  DB::$conn->prepare($query);
        return $res->execute([$name, $prof_id, $high_low, $id]);
    }
}

