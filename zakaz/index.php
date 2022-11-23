<?php
// Начало сессии и проверка есть ли в ней кто уже
require_once '../vendor/connect.php';
session_start();
if (!$_SESSION['user']) {
  header('Location:../login/register.php');
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <title>Ronin</title>
</head>
<body>
  <!-- Вызов шапки -->
    <?php
    include '../header.php';
    ?>
<h1>Заказ билета</h1>
        <div class="cus">
            <!-- Передача названия товара  -->
          <?php
       $product_name = $_GET['name'];
       $product = mysqli_query($connect, "SELECT * FROM `tovars` WHERE `name` = '$product_name'");
       $product = mysqli_fetch_assoc($product);
              ?>
  <!-- Форма с созданием товара -->
        <form action="../vendor/createz.php" method="post" enctype="multipart/form-data">
        <input  type="hidden" name="id_u" value="<?= $_SESSION['user']['id'] ?>">
        <input  type="hidden"name="name" value="<?= $_SESSION['user']['name'] ?>" required>
        <input  type="hidden"name="surname" value="<?= $_SESSION['user']['surname'] ?>" required>
        <input type="hidden" name="film" value="<?= $product['name']?>" >
        <input type="hidden" name="status" value="Новый" >

        <p>Способ оплаты</p>
        <select name = "opl" size="1">
        <option  selected>Выберите способ оплаты</option>
				<option >По карте</option>
				<option >На кассе</option>
			</select>
        <p>Выбор времени сеанса</p>
        <select name = "seans" size="1">
        <option  selected>Выберите время сеанса</option>
				<option >8:00</option>
				<option >10:00</option>
        <option >12:00</option>
        <option >14:00</option>
        <option >16:00</option>
        <option >18:00</option>
        <option >20:00</option>
			</select>
      <p>Выбор количества билетов</p>
      <input type="number" name="bil" value="1" min="1" max="50">
        <br> <br>
      

       
        <button type="submit">Заказать</button>
    </form>  
        </div>



  <!-- Вызов подвала -->
      <?php
    include '../footer.php';
    ?>
</body>
</html>