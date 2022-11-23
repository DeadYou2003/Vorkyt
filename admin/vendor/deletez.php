<?php
//Удаление заказа

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
mysqli_query($connect, "DELETE FROM `zakaz` WHERE `zakaz`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */
header('Location: http://nenf/admin/#sales');