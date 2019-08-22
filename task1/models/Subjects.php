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
}

