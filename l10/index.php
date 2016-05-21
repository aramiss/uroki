<?php

abstract class Article {
    public $title;
    public $text;
    static protected $delim=': ';
    public function __construct($title, $text='') {
        $this->title =$title;
        $this->text =$text;

    }

    public function view() {
        echo $this->title;
    }
}

class NewsArticle extends Article {
    public $author;
    public function view() {
        echo $this->author . self::$delim. $this->title;
    }
}

$a=new NewsArticle("Привет!");
$a->author="Автор";
$a->view();
?>