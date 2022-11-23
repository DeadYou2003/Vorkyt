<?php
// подключение к бд и удаление заказа
require_once '../vendor/connect.php';
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `zakaz` WHERE `zakaz`.`id` = '$id'");
header('Location: https://nenf/login/profile.php');