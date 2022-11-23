
<?php
// начало сессии и подключение к бд
session_start();
require_once '../vendor/connect.php';
// сборка данных и введеный полей
$id_u = $_POST['id_u'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$film = $_POST['film'];
$opl = $_POST['opl'];
$seans = $_POST['seans'];
$bil = $_POST['bil'];
$status = $_POST['status'];
/*
 * Делаем запрос на изменение строки в таблице zakaz
 */

mysqli_query($connect,"INSERT INTO `zakaz` (`id`,`id_u`,`name`, `surname`,  `film`,`opl`, 
 `bil`,`seans`,`time`,`status`) VALUES (NULL, '$id_u','$name', '$surname', 
 '$film','$opl',  '$bil',  '$seans',  NOW(), '$status')");

header('Location: https://nenf/login/profile.php');
?>
