<?php



require_once '../config/connect.php';


$id = $_POST['id'];
$cat = $_POST['cat'];

mysqli_query($connect, "UPDATE `cat` SET `cat` = '$cat' WHERE `cat`.`idc` = '$id'");


header('Location: http://nenf/admin/index.php#catu');