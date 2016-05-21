<?php
require_once('lib.php');
checkSession();

if(isset($_COOKIE['lastpage']) and file_exists("{$_COOKIE['lastpage']}.php")){
    header("Location: {$_COOKIE['lastpage']}.php");
}


?>
<a href="galery.php">Галерея</a>
<a href="b.php">Страница Б</a>

