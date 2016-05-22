<?php
class DB 
{
    private $dbh;
    private $className ='stdClass';
    public function __construct()
    {
        $this->dbh=new PDO('mysql:dbname=test;host=localhost','vova','495566');
    }

    public function setClassName($className)
    {
        $this->className=$className;
    }

    public function queryAll($sql, $params=[])
    {
        $sth=$this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className); 
    }
    
    public function executer($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($params);
    }

    public function lInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function queryOne($sql, $class='stdClass')
    {
        return $this->queryAll($sql,$class)[0];
    }
}
?>