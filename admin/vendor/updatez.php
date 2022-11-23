<?php

//Обновление информации о заказе

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$id = $_POST['id'];

$name = $_POST['name'];
$surname = $_POST['surname'];

$opl = $_POST['opl'];

$status = $_POST['status'];
$com = $_POST['com'];

/*
 * Делаем запрос на изменение строки в таблице zakaz
 */

mysqli_query($connect, "UPDATE `zakaz` SET  `name` = '$name', 
`surname` = '$surname', 
`opl` = '$opl',`status` = '$status' ,
`com` = '$com' WHERE `zakaz`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: http://nenf/admin/#sales');