<?php

    require_once 'config/connect.php';


    $seans_id = $_GET['idc'];


    $seans = mysqli_query($connect, "SELECT * FROM `seans` WHERE `idc` = '$seans_id'");


    $seans = mysqli_fetch_assoc($seans);
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
        <input type="hidden" name="id" value="<?= $seans['id_s'] ?>">
        <p>Название</p>
        <input type="text" name="seans" value="<?= $seans['seans'] ?>">
      
         <br> <br>
        <button type="submit">Редактировать</button>
    </form>
</div>
</body>
</html>