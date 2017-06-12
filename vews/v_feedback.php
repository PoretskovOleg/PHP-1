<p><a href="/">Главная</a> / Отзывы</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<? foreach ($feedbacks as $feedback) : ?>
<p><?=$feedback['text']?></p>
<span> <i>Пользователь:</i>  <?=$feedback['user']?></span>
<span> <i>Дата отзыва:</i> <?=$feedback['date']?></span>
<hr>
<? endforeach; ?>
<h2>Оставить отзыв</h2>
<form action="" method="POST">
  <textarea name="text" id="" cols="100" rows="10"></textarea> <br>
  <button type="submit" name="btn_feedback">Отправить</button>
</form>
