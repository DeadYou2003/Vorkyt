<?php

require_once 'vendor/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/st2.scss">
    <title>NeNetFlix</title>
</head>
<body>
<?php
include'header.php';

?>


<h1>Новинки</h1>
        



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
	<!-- ▲ swiper cdn ▲ -->
<section class="cnt">
        <div class="inner">
            <div class="slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
               
                           

                        <?php

$products = mysqli_query($connect, "SELECT * FROM `tovars` ORDER BY id DESC limit 5");
$products = mysqli_fetch_all($products);

foreach ($products as $product) {
    ?>
         <div class="swiper-slide">

  <img src="../admin/<?= $product[2] ?>" alt="">
  <h3><?= $product[1] ?></h3>

        


                        </div>
                    
<?php
}
?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<h1>О кинотеатре NeNetFlix</h1>
<div class="inf">
<p>Aloha! Или добро пожаловать в NeNetFlix — современный многозальный кинотеатр горнозаводской зоны Челябинской области! NeNetFlix — это 
    стильное и уютное место, где вас встретят также радушно и тепло, как на далёких Гавайских островах.</p>
<p>В NeNetFlix просторно: 2 кинозала формата 3D, рассчитанных на 194 гостя каждый и один на 100. На Вас «обрушится» шесть каналов объемного цифрового звука!</p>
<p>Высочайшее качество 3D на серебряном экране</p>
<p>Хотите пройти испытание реальностью? Новейшая технология кинопоказа Master Image 3D дает улучшенное качество изображения и естественный трехмерный эффект, а серебряные экраны, на которых 
    изображение в четыре раза превосходит то, что Вы видите на обычных экранах, сохранят каждую каплю Ваших эмоций!</p>
<p>Вы отлично проведёте время всей семьёй!</p>
<p>В NeNetFlix киноновинки со всего мира. Каждую неделю у нас премьеры отечественного и мирового кинопроката!</p>
<p>Для школьников, студентов и пенсионеров действуют специальные предложения.</p>
<p>NeNetFlix. Кино рядом!</p>
</div>
<?php
include'footer.php';

?>

<script>
 var getTranslate;
        var slideWidth;

        var mySwiper = new Swiper('.slider .swiper', {
            speed: 8000,
			// ▼画像サイズに合わせて数値変更する
            slidesPerView: 5,
            loop: true,
            freeMode: true,
            freeModeMomentum: false,
            centeredSlides: true,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            }
        })

</script>




</footer>
</body>
</html>