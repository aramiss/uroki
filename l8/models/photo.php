<?php

require_once '/conf/conf.php';

function photo_getAll() {
    $sql = 'SELECT * FROM image';
    return sql_querry($sql);

}
function photo_add($data){

}
?>