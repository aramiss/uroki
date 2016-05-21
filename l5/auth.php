<?php
require_once('lib.php');
?>
<?php
if(isset($_POST['logout'])){ //если была нажата кнопка Exit
    session_destroy(); // забыть всё содержимое $_SESSION
    header( 'Location: #', true, 301); //выполнить редирект
    exit();
}
if (isset($_POST['login']) && isset($_POST['pass'])){
    $_SESSION['login']=$_POST['login'];
    if ($_POST['login']==='as' and $_POST['pass']=== '12'){
        $_SESSION['authorized']=1;
    } else{
        $_SESSION['authorized']=0;
    }
    header( 'Location: index.php', true, 301); //выполнить редирект
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Авторизация</title>
</head>
<body>
<a href="galery.php">Галерея</a>
<?php
if (!is_authorized()) {
    ?>
    <form action="auth.php" method="post">
        Логин <input type="text" name="login"><br><br>
        Пароль <input type="password" name="pass"><br>
        <input type="submit" value="Авторизоваться">
    </form>
    <?php
} else {
?>
Вы авторизованы<br>
<a href="galery.php">Галерея</a>
<a href="b.php">Страница Б</a><br>
    <form action="#" method="post">
        <input type="submit" value="exit" name="logout">
    </form>
    <?php
}

?>
</body>
</html>



