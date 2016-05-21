<?php
function conf_connect(){
    $server = 'localhost'; // Адрес сервера, на котором находится база
    $username = 'vova'; // Имя пользователя
    $password = '495566'; //Пароль
    $DB='test';
    $connect=mysqli_connect($server,$username,$password);
    mysqli_select_db($connect,$DB);
    return $connect;
}
function sql_querry($sql){
    $conn=conf_connect();
    $res=mysqli_query($conn,$sql);
    $ret=[];
    while ($row=mysqli_fetch_assoc($res)){
        $ret[]=$row;
    }
    return $ret;
}
?>