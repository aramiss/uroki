<?php

$ctrl =isset($_GET['ctrl']) ? $_GET['ctrl'] : 'New';
$act =isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl.'Controller';

require_once __DIR__.'/controllers/'.$controllerClassName.'.php';
$controller = new $controllerClassName;
$method  = 'action'.$act;
$controller->$method();
?>