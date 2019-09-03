<?php 

class News
{
    //get all news
    public static function notifications(){
        $query = DB::$conn->prepare('select notifications from news');
        $query->execute([]);
        $news = $query->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    
       }





















}