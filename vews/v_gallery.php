<p><a href="/">Главная</a> / Фотогалерея</p>
<div class="header">
  <h1><?=$title?></h1>
</div>

<div class="images">
  <?php for ($i=0; $i < count($images); $i++) : ?>
    <figure class="image">
      <a href="./index.php?page=image&id=<?=$images[$i]['id']?>&click=<?=$images[$i]['click']?>">
        <img src="<?=$images[$i]['path_small'] ?>">
      </a>
      <figcaption>Просмотров: <?=$images[$i]['click']?></figcaption>
    </figure>
  <?php endfor; ?>
</div>
<div class="clear_float" ></div>

<div class="add_foto">
  <form action="" method="POST" enctype="multipart/form-data">
    <span> <b>Добавить файл: </b> </span>
    <input type="file" name="userfile" accept="image/jpeg,image/png,image/gif" > 
    <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
    <span><?=$message?></span>
  </form>
</div>
