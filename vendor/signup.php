<?php
// начало сессии и подключение к бд
    session_start();
require_once 'connect.php';
// сборка данных и введеный полей
$name =$_POST['name'];
$surname =$_POST['surname'];
$login =$_POST['login'];
$email =$_POST['email'];
$pass =$_POST['pass'];
$password_confirm = $_POST['password_confirm'];
$level = $_POST['level'];



if ($pass === $password_confirm) {
        
/*
 * Делаем запрос на ввод строк в таблицу users
 */
$pass = md5($pass);

    mysqli_query($connect, "INSERT INTO `users` (`id`,`name`,`surname`,`login`, `email`, `pass`,`level`) VALUES (NULL,'$name','$surname', '$login', '$email','$pass' ,Null)");

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../login/index.php');

}
// проверка паролей
    else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../login/register.php');
}
?>