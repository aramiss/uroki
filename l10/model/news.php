<?php
require_once __DIR__.'/../classes/database.php';

class news
{
    public $id;
    public $title;
    public $text;
    public static function getAll()
    {
        $db = new DB(); 
        return $db->query('SELECT * FROM `new`', 'news');
    }

}