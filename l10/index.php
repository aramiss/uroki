<?php

$ctrl =isset($_GET['ctrl']) ? $_GET['ctrl'] : 'New';
$act =isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl.'Controller';

require_once __DIR__.'/controllers/'.$controllerClassName.'.php';
$controller = new $controllerClassName;
$method  = 'action'.$act;

try  //поймали оисключение или нет
{
    $controller->$method();
} catch (ModelException $e)
{
    die('Что то не так: '. $e->getMessage()); //если поймали
}

?>