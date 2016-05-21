<?php
session_name("auth_users");
session_start();

function is_authorized(){
    return @$_SESSION['authorized'] === 1;
}

function checkSession(){
    if (! is_authorized()){
        header('location: auth.php',301);
        exit;
    }
}

function upload_file($file)
{
    $types = array('image/gif', 'image/png', 'image/jpeg');
    if ($file['name'] == '')
    {
        echo 'Файл не выбран!';
        return;
    }
    if(copy($file['tmp_name'], 'img/'.$file['name']))
    {
        $connect=mysqli_connect('localhost','vova','495566');
        mysqli_select_db($connect,'test');
        $dir='img/'.$file['name'];
        $names=$file['name'];
        $date=time();
        $strSQL = "INSERT INTO image( pyth, name, time) VALUES ('$dir','$names','$date')";
        mysqli_query($connect, $strSQL) or die(mysqli_error($connect));
        echo 'Файл успешно загружен';
    }

    else
        echo 'Ошибка загрузки файла';
}