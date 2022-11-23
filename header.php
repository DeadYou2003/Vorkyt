<?php
// Начало сессит
session_start();
?>

<link rel="stylesheet" href="../style/style.css">

<header>

    <a href="http://nenf/"><img src="../image/logo.png" alt=""></a>

<div class="ssl">
<a href="http://nenf/">О нас</a>
    <a href="http://nenf/afix/">Афиша</a>
  
    <a href="http://nenf/gps/">Где нас найти?</a>


    <?php if (empty($_SESSION['user'])):?>
        <a href="http://nenf/login/">Регистрация/Вход</a>

       <?php endif;?>

<?php if (isset($_SESSION['user'])):?>
<a href="https://nenf/login/profile.php"> Логин:<?= $_SESSION['user']['login']?></a><a href="../vendor/logout.php"> Выход</a>
   <a href="../zakaz"></a>
<?php endif;?>
</div>

    </header>