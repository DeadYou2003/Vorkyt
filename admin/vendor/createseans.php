
<?php


require_once '../config/connect.php';


$times = $_POST['times'];


/*
 * Делаем запрос на добавление новой строки в таблицу products
 */


/*
 * Делаем запрос на изменение строки в таблице products
 */


mysqli_query($connect,"INSERT INTO `seans` (`id`, `seans`) VALUES (NULL, '$times')");

/*
 * Переадресация на главную страницу
 */

header('Location: http://nenf/admin/index.php#seans');