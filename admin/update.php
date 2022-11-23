<?php
    require_once 'config/connect.php';
    $tovars_id = $_GET['id'];
    $tovars = mysqli_query($connect, "SELECT * FROM `tovars` WHERE `id` = '$tovars_id'");
    $tovars = mysqli_fetch_assoc($tovars);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара </title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <div class="formu">
    <h3>Редактировать товар</h3>
    <form action="vendor/update.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $tovars['id'] ?>">
        <p>Название</p>
        <input type="text" name="name" value="<?= $tovars['name'] ?>">
        <p>Возраст</p>
        <input name="vozr" value="<?= $tovars['vozr'] ?>">
        <p>Цена</p>
        <input type="number" name="price" value="<?= $tovars['price'] ?>">

        <p>Изображение</p>
<input type="file" name="foto" value="<?= $tovars['$path'] ?>">
<img src="<?= $tovars['$path'] ?>" alt="">

<p>Жанр</p>
        <select name = "cat" size="1" >
        <option  selected><?= $tovars['cat'] ?></option>
<?php
         $catu = mysqli_query($connect, "SELECT * FROM cat"); 
         $catu = mysqli_fetch_all($catu); 
        foreach ($catu as $cat) {
        ?>
        <option ><?= $cat[1] ?></option>
        <?php
            }
        ?>
      </select>

      <p>Дата</p>
<input type="date" name="date" value="<?= $tovars['date'] ?>">

         <br> <br>
        <button type="submit">Редактировать</button>
    </form>
</div>
</body>
</html>