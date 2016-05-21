<?php
require_once __DIR__.'/../model/news.php';
require_once __DIR__.'/../classes/View.php';

class NewController
{
    public function actionAll()
    {
        $items=news::getAll();
        $view=new View();
        //$view->assign('items',$items);
        $view->items=$items;
        echo $view->render('/all.php');
    }
    
    public function actionOne()
    {
        $id=$_GET['id'];
        $item=news::getOne($id);
        $view=new View();
        $view->assign('item',$item);
        $view->render('/news/one.php');
    }
}