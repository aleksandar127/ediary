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

    public static function get_teachers_or_profs($role_id)
    {
        $query = DB::$conn->prepare('select users.first_name, users.last_name, class.high_low from class join users on class.users_id = users.id join role on users.roles_id = role.id where role.id = ?');
        $query->execute([$role_id]); 
        $heads = $query->fetchAll(PDO::FETCH_ASSOC);
        return $heads;
    }
}