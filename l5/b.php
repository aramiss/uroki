<?php
require_once('lib.php');
checkSession();
setcookie('lastpage','b',time() + 60);

?>
<a href="galery.php">Галерея</a>
<a href="auth.php">auth</a>