<?php
// Начало сессии и проверка есть ли в ней кто уже
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ronin</title>
</head>
<body>
    <!-- Вызываем шапку -->
<?php
    include '../header.php'
    ?>
    <!-- Форма со входом -->
<form action="../vendor/signin.php" method="post"  class="log">
<h1>Вход</h1>
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите логин"required>
    <label>Пароль</label>
    <input type="password" name="pass" placeholder="Введите пароль"required>
    <button type="submit">Войти</button>
    <p>
            У вас нет аккаунта? - <a href="http://nenf/login/register.php">зарегистрируйтесь</a>!
        </p>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
</form>
    <!-- Вызываем подвал -->
<?php
    include '../footer.php'
    ?>
</body>
</html>