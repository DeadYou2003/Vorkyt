
<?php


require_once '../config/connect.php';


$name = $_POST['name'];


/*
 * Делаем запрос на добавление новой строки в таблицу products
 */


/*
 * Делаем запрос на изменение строки в таблице products
 */


mysqli_query($connect,"INSERT INTO `catu` (`id`, `name`) VALUES (NULL, '$name')");

/*
 * Переадресация на главную страницу
 */

header('Location: http://nenf/admin/index.php#catu');