<?php
require_once('lib.php');
require_once('conf.php');
setcookie('lastpage','galery',time() + 60);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>\</title>
</head>
<body>
<?php
$connect=mysqli_connect($server, $username, $password);
mysqli_select_db($connect,$DB );
$res=mysqli_query($connect,'SELECT count(*) FROM image');
$res1=mysqli_query($connect,'SELECT * FROM image');
$count=mysqli_fetch_row($res);
for ($i=1; $i<=$count[0]; $i++){
    $row=mysqli_fetch_array($res1);
    $image=$row['pyth'];

/*foreach ($imagies as $image)
{/*/

        echo '<a href="/l5/' . $image . '"><img src="/l5/' . $image . '" width="200" height="200" /></a>';
        if ($i % 4 == 0) {
            echo "<br>";
        }

}

echo "<br>";
if (isset($_FILES['file']))
{
    upload_file($_FILES['file']);

}
?>
<?php
if (is_authorized())
{ ?>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Загрузить файл!" />
</form><?php
}
else {
    echo "Авторизуйтесь для загрузки фото и увеличения фотографий <br>";
}
?>

<a href="b.php">Страница Б</a>
<a href="auth.php">auth</a>
</body>
</html>

