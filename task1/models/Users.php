<?php

class Users
{

    public function login_user($username, $password)
    {
        $query = 'select users.id, users.first_name, users.last_name, users.username, users.password, users.role_id, role.name as role_name from users join role where username = "'.$username.'" and password = "'.$password.'"';
        $res = DB::$conn->query($query);
        $users = [];
		while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
			$users = $user; 
		}
		return $users;
    }
}