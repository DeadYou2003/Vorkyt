<?php

//Обновление информации о клиенте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$login = $_POST['login'];
$email = $_POST['email'];
$num = $_POST['num'];
$pass = $_POST['pass'];




/*
 * Делаем запрос на изменение строки в таблице users
 */

mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `email` = '$email', `num` = '$num',  `pass` = '$pass' WHERE `users`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: http://ronin.ru/admin/index.php#buyers');