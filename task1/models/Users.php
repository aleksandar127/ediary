<?php

class Users
{

    public function get_user_by_username_pass($username, $password)
    {
        $query = 'select users.id, users.first_name, users.last_name, users.username, users.password, users.cookie, users.role_id, role.name as role_name from users join role on users.role_id=role.id  where users.username = "'.$username.'" and users.password = "'.$password.'"';
        $res = DB::$conn->query($query);
        $users = [];
		while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
			$users = $user; 
		}
		return $users;
    }

    public static function get_user_by_id($id)
    {
        $query = DB::$conn->prepare('select users.id, users.first_name, users.last_name, users.username, users.password, users.cookie, users.role_id, role.name as role_name from users join role on users.role_id=role.id where users.id=?');
        $query->execute([$id]); 
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public static function set_user_cookie($cookie, $id)
    {
        $query = 'update users set cookie=? where id=?';
        $res=  DB::$conn->prepare($query);
        $res->execute([$cookie, $id]);
    }

    public static function cookies_by_roles($role)
    {
        $query = DB::$conn->prepare('select users.cookie, users.role_id, role.name as role_name from users join role on users.role_id = role.id where role_id=?');
        $query->execute([$role]); 
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}