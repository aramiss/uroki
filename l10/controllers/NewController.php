<?php
require_once __DIR__.'/../model/news.php';

class NewController
{
    public function actionAll()
    {
        $items=news::getAll();
        include __DIR__ . '/../view/all.php';
    }
    
    public function actionOne()
    {
        $id=$_GET['id'];
        $item=news::getOne($id);
        include __DIR__.'/../view/news/one.php';
    }
}