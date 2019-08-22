<?php 

class Subjects
{
    public static function all_subjects($grade)
    {
        $query = DB::$conn->prepare('select * from subjects where high_low=?');
        $query->execute([$grade]); 
        $subjects = $query->fetchAll(PDO::FETCH_ASSOC);
        return $subjects;
    }
}