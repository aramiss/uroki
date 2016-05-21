<?php
class DB 
{
    public function __construct()
    {
        mysql_connect('localhost', 'vova', '495566');
        mysql_select_db('test');
    }

    public function query($sql, $class='stdClass')
    {

        $result=mysql_query($sql);

        if(fasle  === $result)
        {
            return false;
        }
        $ret=[];
        while ($row = mysql_fetch_object($result, $class))
        {
            $ret[]=$row;
        }
        return $ret;
    }
}
?>