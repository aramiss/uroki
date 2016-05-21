<?php
require_once __DIR__.'/../classes/database.php';
require_once __DIR__.'/../classes/AbstractModel.php';

class news extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    
    protected static $table ='new';
    protected static $class='news';

}