<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>\</title>
</head>
<body>
<?php
$imagies=scandir(__DIR__.'/img');
$i=0;
foreach ($imagies as $image)
{
    if ($image != "." && $image != "..") {

        ++$i;
        echo '<img src="/l6/img/' . $image . '" width="200" height="200" />';
        if ($i % 4 == 0) {
            echo "<br>";
        }
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
        echo 'Файл успешно загружен';
    else
        echo 'Ошибка загрузки файла';
}

if (isset($_FILES['file']))
{
    upload_file($_FILES['file']);
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Загрузить файл!" />
</form>


</body>
</html>