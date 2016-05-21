<?php
$connect=mysqli_connect('localhost','vova','495566');
mysqli_select_db($connect,'test');
$res=mysqli_query($connect,'SELECT * FROM people');
while ($row=mysqli_fetch_array($res)){
    echo $row['id'].' ';
    echo $row['name'];
    echo "<br>";
}

mysqli_close();
?>