

<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID клиента из адресной строки 
     */

    $users_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $users = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$users_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $users = mysqli_fetch_assoc($users);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование пользователя</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<div class="formu">
    <h3>Редактировать пользователя</h3>
    <form action="vendor/updatek.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $users['id'] ?>">
        <p>Логин</p>
        <input type="text" name="login" value="<?= $users['login'] ?>">
        <p>E-mail</p>
        <textarea name="email"><?= $users['email'] ?></textarea>
        <p>Номер</p>
        <input type="number" name="num" value="<?= $users['num'] ?>">
<input type="hidden" name="pass" value="<?= $users['pass'] ?>">
         <br> <br>
        <button type="submit">Редактировать</button>
    </form>
</div>
</body>
</html>