<?php

class View
{
    protected $data=[];
    
    public function assign ($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function render($template)
    {
        foreach ($this->data as $key=>$val)
        {
            $$key = $val;
        }
        ob_start();
        include __DIR__.'/../view'.$template;
        $contents=ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}
?>