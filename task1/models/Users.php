<?php

class Users
{
    public function login_user($username, $password)
    {
        // global $conn;
        $query = 'select * from users where username = "'.$username.'" and password = "'.$password.'"';
        $res = DB::$conn->query($query);
        $users = [];
		while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
			$users[] = $user; 
		}
		return $users;
    }
}