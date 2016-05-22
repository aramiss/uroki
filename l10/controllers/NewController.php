<?php
require_once __DIR__.'/../model/news.php';
require_once __DIR__.'/../classes/View.php';
require_once __DIR__ . '/../model/NewsModel.php';
require_once __DIR__.'/../classes/database.php';

class NewController
{
    public function actionAll()
    {
        $art= NewsModel::findColum('title','Onoe');
        $art->title = 'One';
        $art->save();
        
    }
}