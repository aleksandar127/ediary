<?php

class Users
{

    public function login_user($username, $password)
    {
        $query = 'select users.id, users.first_name, users.last_name, users.username, users.password, users.role_id, role.name as role_name from users join role on users.role_id=role.id  where users.username = "'.$username.'" and users.password = "'.$password.'"';
        $res = DB::$conn->query($query);
        $users = [];
		while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
			$users = $user; 
		}
		return $users;
    }


    public static function set_user_cookie($cookie, $id)
    {
        $query = 'update users set cookie=? where id=?';
        $res=  DB::$conn->prepare($query);
        $res->execute([$cookie, $id]);
    }

    
}