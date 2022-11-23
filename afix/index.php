<?php

require_once '../vendor/connect.php';



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



<main class="main">
      <div class="films _container">
        <center>
          <div class="film_filters ">
        <button class="but_filter" onclick="get_cards('all')">Все</button>
        <?php
          $sql_catu = mysqli_query($connect, "SELECT * FROM `cat`"); 
          while($row = $sql_catu->fetch_assoc()):
        ?>
          <button class="but_filter" onclick="get_cards('<?php echo $row['cat']?>')"><?php echo $row["cat"]?></button>
        <?php endwhile ?>
      </div>
      <div class="films_grid">
        <?php
    $sql_films = mysqli_query($connect,"SELECT * FROM tovars as f, cat as c WHERE f.cat = c.cat AND date >= CURDATE()");
          while($row = $sql_films->fetch_assoc()):
        ?>
          <div class="film_card" id="<?php echo $row["cat"]?>">
            <center>
              <a href="../film/index.php?id=<?php echo $row["id"]?>">
              <img src="../admin/<?= $row["foto"] ?>">
       
              <h3 class="film_name"><?php echo $row["name"]?></h3>
              <p><?php echo $row["price"]?>.руб</p>
              <a href="">Поробнее</a>
              </a> </center>
          </div>
        <?php endwhile ?>
      </div>
        </center>
      </div>
    </main>




    </div>



<script type="text/javascript">
  let all_cards = Array.from(document.getElementsByClassName("film_card"));
  function reset()
  {
    for(let i=0; i < all_cards.length; i++)
    {
      if(all_cards[i].style.display == "none")
      {
        all_cards[i].style.display = "block";
      }
    }
  }
  function get_cards(cat)
  {
    if(cat == 'all')
    {
      reset();
    }
    else
    {
      reset();
      for(let i=0; i < all_cards.length; i++)
      {
        if(all_cards[i].id != cat)
        {
          all_cards[i].style.display = "none";
        }
      }
    }
  }
</script>



</div>




<?php
include'../footer.php';

?>







</body>
</html>