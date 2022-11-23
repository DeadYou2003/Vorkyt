<?php
// Подключение к бд
    $connect = mysqli_connect('localhost', 'root', '', 'nenf');

    if (!$connect) {
        die('Error connect to DataBase');
    }