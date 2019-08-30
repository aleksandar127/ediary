<?php 

class Schedule
{

public static function get_schedule(){
    $query = DB::$conn->prepare('select terms.day_in_week,terms.lesson_no,class.name from terms join subjects on subjects.id=terms.subjects_id join users on users.id=subjects.users_id join schedule on schedule.id=terms.schedule_id join class on class.id=schedule.class_id where users.id=?');
    $query->execute([$_COOKIE['id']]);
    $schedule = $query->fetchAll(PDO::FETCH_ASSOC);
    return $schedule;
   }



}