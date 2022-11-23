<?php

    require_once 'config/connect.php';


    $catu_idc = $_GET['idc'];


    $catu = mysqli_query($connect, "SELECT * FROM `cat` WHERE `idc` = '$catu_idc'");


    $catu = mysqli_fetch_assoc($catu);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара </title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <div class="formu">
    <h3>Редактировать товар</h3>
    <form action="vendor/updatehanr.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $catu['idc'] ?>">
        <p>Название</p>
        <input type="text" name="cat" value="<?= $catu['cat'] ?>">
      
         <br> <br>
        <button type="submit">Редактировать</button>
    </form>
</div>
</body>
</html>