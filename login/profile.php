<?php
// Начало сессии и проверка есть ли в ней кто уже
session_start();
if (!$_SESSION['user']) {
    header('Location:../login/register.php');
}
//передача сессии в массив с подключением к бд
$users1 = $_SESSION['user']['id'];
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once '../vendor/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Вызов шапки -->
    <?php 
include'../header.php';
?>
    <!-- Профиль -->
<div class="lih">
<div class="myinf">
       <h1>Мои данные</h1> 
       <table>
    <tr>
        <td>Мой логин:<?= $_SESSION['user']['login'] ?></td>

    </tr>
    <tr>
        <td>Мой e-mail: <?= $_SESSION['user']['email'] ?></td>
    
    </tr>
</table>
        <a href="../vendor/logout.php" class="logout">Выход</a> 
</div>
<!-- Блок с заказами -->
<div class="korz">
<h1>Мои заказы</h1> 
<h2>Новые заказы</h2>
<div class="table-wrap">

<table class="table-1"> 
        <tr>
            <th>Номер заказа</th>
            <th>Имя фамилия</th>
            <th>Фильм</th>
            <th>Способ оплаты</th>
            <th>Количество билетов</th>
  
            <th>Выбранное время сеанса</th>
            <th>Статус</th>
            <th>Комментарий</th>
        </tr>
<!-- Делаем выборку из таблицы -->
        <?php
            $zakaz = mysqli_query($connect, "SELECT * FROM `zakaz` WHERE `id_u`='$users1' And status ='Новый'");
            $zakaz = mysqli_fetch_all($zakaz);
            foreach ($zakaz as $zakazs) {
                ?>
                    <tr>
                        <td><?= $zakazs[0] ?></td>
                        <td><?= $zakazs[3] ?> <?= $zakazs[2] ?></td>
                        <td><?= $zakazs[4] ?></td>
                        <td><?= $zakazs[5] ?></td>
                        <td><?= $zakazs[6] ?></td>
                  
                        <td><?= $zakazs[8] ?></td>
                        <td><?= $zakazs[9] ?></td>
                        <td><?= $zakazs[10] ?></td>
                        <script type="text/javascript">
                          function confirmation(){
                            return confirm('Вы уверены что хотите удалить, нажмите ок'
                            )
                          }
                          </script>
                        <td><a style="color: red;" href="../vendor/deletez.php?id=<?= $zakazs[0] ?>" onclick="return confirmation()" >Удалить</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>

    <h2>Остальные заказы</h2>
    <div class="table-wrap">

<table class="table-1"> 
        <tr>
            <th>Номер заказа</th>
            <th>Имя фамилия</th>
            <th>Film</th>
            <th>Способ оплаты</th>
            <th>Количество билетов</th>
            <th>Товар</th>
            <th>Выбранное время сеанса</th>
            <th>Статус</th>
            <th>Комментарий</th>
        </tr>
<!-- Делаем выборку из таблицы -->
        <?php
            $zakaz = mysqli_query($connect, "SELECT * FROM `zakaz` WHERE `id_u`='$users1'  AND status !='Новый' ORDER BY id DESC ");
            $zakaz = mysqli_fetch_all($zakaz);
            foreach ($zakaz as $zakazs) {
                ?>
                    <tr>
                        <td><?= $zakazs[0] ?></td>
                        <td><?= $zakazs[3] ?> <?= $zakazs[2] ?></td>
                        <td><?= $zakazs[4] ?></td>
                        <td><?= $zakazs[5] ?></td>
                        <td><?= $zakazs[6] ?></td>
                        <td><?= $zakazs[7] ?></td>
                        <td><?= $zakazs[8] ?></td>
                        <td><?= $zakazs[9] ?></td>
                        <td><?= $zakazs[10] ?></td>
                    
                     
                    </tr>
                <?php
            }
        ?>
    </table>
</div>
</div>
</div>
<!-- Вызов подвала -->
<?php 
include'../footer.php';
?>

</body>
</html>