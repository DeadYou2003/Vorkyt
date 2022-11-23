<?php


require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$id = $_POST['id'];
$name = $_POST['name'];


$path = 'upload/products/' . time() . $_FILES['foto']['name'];
if (!move_uploaded_file($_FILES['foto']['tmp_name'], '../' . $path))  {
    header('Location: http://nenf/admin/index.php#orders');
}
$date = $_POST['date'];
$vozr = $_POST['vozr'];
$price = $_POST['price'];
$cat = $_POST['cat'];








mysqli_query($connect, "UPDATE `tovars` SET `name` = '$name', 
`foto` = '$path', `date` = '$date', `vozr` = '$vozr', `price` = '$price', `cat` = '$cat'  
WHERE tovars.id = '$id'");


header('Location: http://nenf/admin/index.php#orders');