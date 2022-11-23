<?php
    require_once '../vendor/connect.php';
    $tovars_id = $_GET['id'];
    $tovars = mysqli_query($connect, "SELECT * FROM `tovars` WHERE `id` = '$tovars_id'");
    $tovars = mysqli_fetch_assoc($tovars);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>NeNetFlix</title>
</head>
<body
<?php
include'../header.php';

?>
<h1>Сеанс</h1>

<div class="infs">


<img src="../admin/<?= $tovars["foto"] ?>">

<table class="iksweb">
	<tbody>
		<tr>
			<td>Название: </td>
			<td><?= $tovars["name"] ?></td>
		</tr>
		<tr>
			<td>Возраст: </td>
			<td><?= $tovars["vozr"] ?></td>
		</tr>
		<tr>
			<td>Цена: </td>
			<td><?= $tovars["price"] ?>руб.</td>
		</tr>
		<tr>
			<td>Жанр: </td>
			<td><?= $tovars["cat"] ?></td>
		</tr>
        <tr>
			<td>Дата показа: </td>
			<td><?= $tovars["date"] ?></td>
		</tr>
	</tbody>
</table>



</div >
<a href="../zakaz/index.php?name=<?=$tovars["name"] ?>"><h1>Заказать билеты</h1> </a>

<?php
include'../footer.php';

?>





</footer>
</body>
</html>