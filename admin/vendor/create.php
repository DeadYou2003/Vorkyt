
<?php


require_once '../config/connect.php';


$name = $_POST['name'];
$cat = $_POST['cat'];
$price = $_POST['price'];
$date = $_POST['date'];
$vozr = $_POST['vozr'];

 $path = 'upload/products/' . time() . $_FILES['foto']['name'];
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], '../' . $path))  {
            header('Location: http://ronin.ru/admin/index.php#orders');
        }

/*
 * Делаем запрос на изменение строки в таблице products
 */


mysqli_query($connect,"INSERT INTO `tovars` (`id`, `name`,`vozr`, `price`,`cat`, `date`,`foto`) VALUES (NULL, '$name','$vozr', '$price','$cat','$date', '$path')");

/*
 * Переадресация на главную страницу
 */

header('Location: http://nenf/admin/index.php#orders');