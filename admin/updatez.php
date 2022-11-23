<?php
    require_once 'config/connect.php';

    $zakazs_id = $_GET['id'];
    $zakazs = mysqli_query($connect, "SELECT * FROM `zakaz` WHERE `id` = '$zakazs_id'");


    $zakazs = mysqli_fetch_assoc($zakazs);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ronin</title>
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
<div class="formu">
    <h3>Редактирование заказа</h3>

    <form action="vendor/updatez.php" method="post" class="formu">
    <input type="hidden" name="id" value="<?= $zakazs['id'] ?>">
        <p>Фамилия</p>
        <input  type="text"name="surname" value="<?= $zakazs['surname'] ?>" required>
        <p>Имя</p>
        <input type="text" name="name" value="<?= $zakazs['name'] ?>"required>
   
        <p>Способ оплаты</p>
        <select name = "opl" size="1">
        <option  selected><?= $zakazs['opl'] ?></option>
				<option >По карте</option>
				<option >На кассе</option>
			</select>
   
            <p>Статус заказа</p>
        <select name = "status" size="1">
        <option  selected><?= $zakazs['status'] ?></option>
				<option >Открытый</option>
				<option >Закрытый</option>
                <option >Отклонённый</option>
			</select>
            <p>Комментарий</p>

            <input type="text" name="com"  value="<?= $zakazs['com'] ?>">
<br> <br>
        <button type="submit">Редактировать</button>
    </form> 
</div> 
</body>
</html>