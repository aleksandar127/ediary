<?php


class Classes
{
    public static function classes_db()
    {
        $query = DB::$conn->prepare('select class.id, class.name, class.users_id, class.high_low, users.first_name, users.last_name from class join users on class.users_id = users.id');
        $query->execute(); 
        $classes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    public static function all_classes($high_low)
    {
        $query = DB::$conn->prepare('select class.id, class.name, class.users_id, class.high_low, users.first_name, users.last_name from class join users on class.users_id = users.id where class.high_low = ?');
        $query->execute([$high_low]); 
        $classes = $query->fetchAll(PDO::FETCH_ASSOC);
        return $classes;
    }

    public static function get_teachers_or_profs($role_id)
    {
        $query = DB::$conn->prepare('select users.first_name, users.last_name, role.name, users.id from users join role on users.roles_id = role.id where role.id = ?');
        $query->execute([$role_id]); 
        $heads = $query->fetchAll(PDO::FETCH_ASSOC);
        return $heads;
    }

    public static function get_class_by_id($id)
    {
        $query = DB::$conn->prepare('select * from class where id = ?');
        $query->execute([$id]);
        $class = $query->fetch(PDO::FETCH_ASSOC);
        return $class;
    }

    public static function edit_class($class_name, $class_head, $high_low, $id)
    {
        $query = 'update class set name=?, users_id=?, high_low=? where id=?';
        $res=  DB::$conn->prepare($query);
        return $res->execute([$class_name, $class_head, $high_low, $id]);
    }

    public static function delete($id)
    {
        $query = 'delete from class where id=? limit 1';
        $res=  DB::$conn->prepare($query);
        return $res->execute([$id]);
    }

    public static function make_class($class_name, $prof_id, $high_low, $parent_name, $parent_surname, $parent_username, $parent_pass, $role_id, $puple_n, $puple_s)
    {
       try {  
            DB::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            DB::$conn->beginTransaction();
            $query = DB::$conn->prepare("insert into class (name, users_id, high_low) values (?, ?, ?)");
            $query->execute([$class_name, $prof_id, $high_low]); 
            $class_id = DB::$conn->lastInsertId(); 
            // var_dump($class_id);

            $query =  DB::$conn->prepare("insert into users (first_name, last_name, username, password, roles_id) values (?, ?, ?, ?, ?)");
            $query->execute([$parent_name, $parent_surname, $parent_username, $parent_pass, $role_id]); 
            $parent_id = DB::$conn->lastInsertId(); 

            $query = DB::$conn->prepare("insert into students (first_name, last_name, class_id, users_id) 
                values (?, ?, ?, ?)");
            $query->execute([$puple_n, $puple_s, $class_id, $parent_id]); 
            DB::$conn->commit();
        
        } catch (Exception $e) {
            DB::$conn->rollBack();
            echo "Failed: " . $e->getMessage();
            return false;
        }
        return true;

    }

    public static function get_class_by_name($class_name)
    {
        $query = DB::$conn->prepare('select * from class where name = ?');
        $query->execute([$class_name]);
        $class = $query->fetch(PDO::FETCH_ASSOC);
        return $class;

    }
}