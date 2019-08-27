<?php


class Classes
{
    public static function all_classes($high_low)
    {
        $query = DB::$conn->prepare('select class.id, class.name, class.users_id, class.high_low, users.first_name, users.last_name from class join users on class.users_id = users.id where class.high_low = ?');
        $query->execute([$high_low]); 
        $classes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }
}