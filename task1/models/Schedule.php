<?php 

class Schedule
{

    public static function get_schedule(){
        $query = DB::$conn->prepare('select schedule.day_in_week, schedule.lesson_no, class.name from schedule join subjects on subjects.id= schedule.subjects_id join users on users.id = subjects.users_id join class on class.id = schedule.class_id where users.id=?');
        $query->execute([$_COOKIE['id']]);
        $schedule = $query->fetchAll(PDO::FETCH_ASSOC);
        return $schedule;
    }

    public static function schedule_by_class($class_id)
    {
        $query = DB::$conn->prepare('select schedule.day_in_week, schedule.lesson_no, subjects.name as subject, class.name as class from schedule join subjects on schedule.subjects_id = subjects.id join class on schedule.class_id = class.id where schedule.class_id = ?');
        $query->execute([$class_id]);
        $schedule = $query->fetchAll(PDO::FETCH_ASSOC);
        return $schedule;
    }


}