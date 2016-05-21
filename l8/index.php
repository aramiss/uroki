<?php
require 'models/photo.php';
$items=photo_getAll();


include 'view/index.php';

?>
