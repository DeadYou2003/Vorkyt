<?php

//Удаление клиента

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID клиента из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы users
 */

mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: http://ronin.ru/admin/index.php#buyers');