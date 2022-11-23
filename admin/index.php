
<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// if ( $_SESSION['user'] == true and $_SESSION['level'] == 1) {
//   header('Location: http://nenf/admin/');
// }
// else{
//   header('Location: http://nenf/');
// }
/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
  <title>Ronin</title>
  <link rel="stylesheet" href="style/main.css">
</head>
<body>




<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
    <img src="../image/Logo.png" alt="">


    </div>
    <ul>
      <!-- Вкладки -->
      <li><a href="#dashboard" id="targeted">Панель состояния</a></li>
      <li><a href="#sales">Заказы</a></li>
      <li><a href="#orders">Фильмы</a></li>
      <li><a href="#buyers">Покупатели</a></li>
 
      <li><a href="#catu">Категории</a></li>
  
    </ul>
  </div>
  <div class="main">
    <div class="mainContent clearfix">
      <div id="dashboard">
        <h2 class="header"><span class="icon"></span>Панель состояния</h2>
    <!-- Блок с запросами  к бд и узнаванием количества строк в той или иной таблице -->
        <div class="vidget">
        <h2>Всего покупателей:</h2>
<p>
   <!-- количество клиентов  -->

</p>
</div>
 <!-- Вывод последних 2 заказов -->
 <div>
<h2>Последние заказы</h2>
<table>
        <tr>
            <th>ID</th>
            <th>ID клиента</th>
            <th>Имя Фамилия</th>
            <th>Адрес</th>
            <th>Способ оплаты</th>
            <th>Способ доставки</th>
            <th>Товар</th>
            <th>Статус заказа</th>
        </tr>

    
    </table>
  </div>
       </div>
       <div id="orders">
          <h2 class="header">Фильмы </h2>
          <!-- Модальное окно с добавление товара -->
       <div class="css-modal-details">    
    <details>
        <summary> <h3>Добавить новый фильм</h3></summary>
        <div class="cmc">
            <div class="cmt">
            <h3>Редактировать товар</h3>
    <form action="vendor/create.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" >
        <p>Название</p>
        <input type="text" name="name" >
        <p>Возраст</p>
        <input name="vozr" >
        <p>Цена</p>
        <input type="number" name="price" >

        <p>Изображение</p>
<input type="file" name="foto" >
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
<input type="date" name="date">

         <br> <br>
        <button type="submit">Редактировать</button>
    </form>
    
            </div>
        </div>
    </details>
</div>
         <div>
        <!-- Вывод из бд таблицы с товарами  возможнотью редакции и удаления-->
         <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Возраст</th>
            <th>Цена</th>
            <th>Жанр</th>
            <th>Дата</th>
            <th>Изображение</th>
        </tr>

        <?php

            $products = mysqli_query($connect, "SELECT * FROM `tovars`");


            $products = mysqli_fetch_all($products);

            foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product[0] ?></td>
                        <td><?= $product[1] ?></td>
                        <td><?= $product[4] ?></td>
                        <td><?= $product[5] ?>руб.</td>
                        <td><?= $product[6] ?></td>
                        <td><?= $product[3] ?></td>
                        <td><img src="<?= $product[2] ?>" alt=""></td>

                        <td>
                          <a href="update.php?id=<?= $product[0] ?>">Редактировать</a></td>
                        <script type="text/javascript">
                          function confirmation(){
                            return confirm('Вы уверены что хотите удалить, нажмите ок'
                            )
                          }
                          </script>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>" onclick="return confirmation()" >Удалить</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    </div>
       </div>
       <div id="buyers">
         <h2 class="header">Покупатели</h2>
         <div>
               <!-- Вывод из бд таблицы с пользователями возможнотью редакции и удаления -->
        <table>
       <tr>
           <th>ID</th>
           <th>Логин</th>
           <th>e-mail</th>
           <th>Номер</th>
       </tr>

       <?php
           $user = mysqli_query($connect, "SELECT * FROM `users`");
           $user = mysqli_fetch_all($user);
           foreach ($user as $user) {
               ?>
                   <tr>
                       <td><?= $user[0] ?></td>
                       <td><?= $user[1] ?></td>
                       <td><?= $user[2] ?></td>
                       <td><?= $user[3] ?></td>

                       <td>
                         <a href="updatek.php?id=<?= $user[0] ?>">Редактировать</a></td>
                       <td><a id="del" href="vendor/deletek.php?id=<?= $user[0] ?>" onclick="return confirmation()" >Удалить</a></td>
                   </tr>
               <?php
           }
       ?>
   </table>
   </div>
       </div>
       <div id="sales">
         <h2 class="header">Заказы</h2>
                <!-- Вывод из бд таблицы с заказа с возможнотью редакции и удаления -->
                <table class="table-1"> 
        <tr>
            <th>ID заказа </th>
            <th>ID клиента</th>
            <th>Имя фамилия</th>
            <th>Фильм</th>
            <th>Способ оплаты</th>
            <th>Количество билетов</th>
            <th>Время создания заказа</th>
            <th>Выбранное время сеанса</th>
            <th>Статус</th>
            <th>Комментарий</th>
        </tr>
<!-- Делаем выборку из таблицы -->
        <?php
            $zakaz = mysqli_query($connect, "SELECT * FROM `zakaz` ");
            $zakaz = mysqli_fetch_all($zakaz);
            foreach ($zakaz as $zakazs) {
                ?>
                    <tr>
                        <td><?= $zakazs[0] ?></td>
                        <td><?= $zakazs[1] ?></td>
                        <td><?= $zakazs[3] ?> <?= $zakazs[2] ?></td>
                        <td><?= $zakazs[4] ?></td>
                        <td><?= $zakazs[5] ?></td>
                        <td><?= $zakazs[6] ?></td>
                        <td><?= $zakazs[7] ?></td>
                        <td><?= $zakazs[8] ?></td>
                        <td><?= $zakazs[9] ?></td>
                        <td><?= $zakazs[10] ?></td>
                        <td>
                          <a href="updatez.php?id=<?= $zakazs[0] ?>">Редактировать</a></td>
                        <script type="text/javascript">
                          function confirmation(){
                            return confirm('Вы уверены что хотите удалить, нажмите ок'
                            )
                          }
                          </script>
                        <td><a style="color: red;" href="vendor/deletez.php?id=<?= $zakazs[0] ?>" onclick="return confirmation()" >Удалить</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>

       </div>
       <div id="catu">
         <h2 class="header">Жанры</h2>
         <div>
         <div class="css-modal-details">    
    <details>
        <summary> <h3>Добавить новый жанр</h3></summary>
        <div class="cmc">
            <div class="cmt">
            <form action="vendor/createhanr.php" method="post" enctype="multipart/form-data">
        <p>Название</p>
        <input type="text" name="cat">
  


        <br> <br>
        <button type="submit">Добавить
    </form>  
            </div>
        </div>
    </details>
</div>
               <!-- Вывод из бд таблицы с пользователями возможнотью редакции и удаления -->
        <table>
       <tr>
           <th>ID</th>
           <th>Название</th>
       </tr>

       <?php
           $cat = mysqli_query($connect, "SELECT * FROM `cat`");
           $cat = mysqli_fetch_all($cat);
           foreach ($cat as $cat) {
               ?>
                   <tr>
                       <td><?= $cat[0] ?></td>
                       <td><?= $cat[1] ?></td>

                       <td>
                         <a href="updatehanr.php?idc=<?= $cat[0] ?>">Редактировать</a></td>
                       <td><a id="del" href="vendor/deletehanr.php?idc=<?= $cat[0] ?>" onclick="return confirmation()" >Удалить</a></td>
                   </tr>
               <?php
           }
       ?>
   </table>
   </div>
       </div>
       
 
     </div>
   </div>
</div>
          </body>
          </html>