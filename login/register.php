<?php
// Начало сессии и проверка есть ли в ней кто уже
    session_start();

    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="..//style/style.css">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <!-- Вызываем шапку -->
<?php
    include '../header.php'
    ?>
    <!-- Форма регистрации -->

    <form action="../vendor/signup.php" method="post" enctype="multipart/form-data" class="log">
    <label>Имя</label>
    <br>
        <input type="text" name="name" placeholder="Введите своё имя" required>
        <br>
        <label>фамилия</label>
        <br>
        <input type="text" name="surname" placeholder="Введите свою фамилию" required>
        <br>
        
        <label>Логин</label>
        <br>
        <input type="text" name="login" placeholder="Введите свой логин" required>
        <br>
        <label>Почта</label>
        <br>
        <input type="email" name="email" placeholder="Введите свой логин" required>
        <br>
        <label>Пароль</label>
        <br>
        <input type="password" name="pass" placeholder="Введите пароль"required>
        <br>
        <label>Подтверждение пароля</label>
        <br>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль"required>
        <br>
       
        <label>Cогласие с правилами регистрации</label>

       
        <input type="radio" name="rules" required>
        <br>
        <button type="submit">Зарегистрироватся</button>
        <p>
            У вас уже есть аккаунт? - <a href="http://Nenf/login/">авторизируйтесь</a>!
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