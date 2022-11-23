<?php
// начало сессии и подключение к бд
    session_start();
    require_once 'connect.php';
// сборка данных и введеный полей
    $login =$_POST['login'];
    $pass = md5($_POST['pass']);
// проверка данныйх
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
// запуск данных с сессией
        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "email" => $user['email'],
            "level" => $user['level'],
        ];
        $_SESSION['auth'] = true; 

        /*
            Пишем в сессию логин и id пользователя
            (их мы берем из переменной $user!):
        */
        $_SESSION['id'] = $user['id']; 
        $_SESSION['login'] = $user['login']; 
    
        //Пишем в сессию статус пользователя (приоритет):
        $_SESSION['level'] = $user['level']; 

        header('Location: http://nenf/');
// проверка на логин и пароль
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../login/index.php');
    }
    ?>
