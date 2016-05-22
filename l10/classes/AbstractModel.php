<?php
require_once __DIR__.'/../classes/IModel.php';
abstract class AbstractModel
{
    protected static $table;
    protected $data=[];

    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }
    
    public function __isset($name)
    {
        return $this->data[$name];
    }

    public static function findAll()
    {
        $class=get_called_class();  // Дает имя текущего класса
        $sql='SELECT * FROM '.static::$table;
        $db=new DB();
        $db->setClassName($class);
        return $db->queryAll($sql);
    }
    
    public static function findColum($colums, $value)
    {
        $class=get_called_class();
        $db=new DB();
        $db->setClassName($class);
        $sql='SELECT * FROM '.static::$table.' WHERE '.$colums.'=:value';
        return $db->queryAll($sql, [':value' => $value])[0];
    }
    
    public static function findOne($id)
    {
        $sql='SELECT * FROM '.static::$table.' WHERE id=:id';
        $db=new DB();
        return $db->queryAll($sql, [':id' => $id]); 
    }

    protected function insert()
    {
        $cols = array_keys($this->data); // список всех полей массива
        $data=[];
        foreach ($cols as $col)
        {
            $data[':'.$col]=$this->data[$col];
        }
        $sql='
          INSERT INTO '.static::$table.' 
          ('.implode(', ', $cols).') 
          VALUES 
          ('.implode(', ', array_keys($data)).')
        ';
        $db=new DB();
        $db->executer($sql, $data);
        $this->id=$db->lInsertId();
    }
    
    protected function update()
    {
        $cols=[];
        $data=[];
        foreach ($this->data as $ke=>$val)
        {
            $data[':'.$ke]=$val;
            if ('id' == $ke)
            {
                continue;
            }
            $cols[]=$ke.'=:'.$ke;
        }
        
        $sql='
            UPDATE '.static::$table.'
            SET '.implode(', ', $cols).'
            WHERE id=:id        
        ';
        $db=new DB();
        $db->executer($sql,$data);
    }
    
    public function save()
    {
        if(!isset($this->id))
        {
            $this->insert();
        } else
        {
            $this->update();
        }
    }
}