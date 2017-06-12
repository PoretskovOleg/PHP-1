<p><a href="/">Главная</a> / Мой кабинет</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<h2>Добро пожаловать, 
  <?= isset($_SESSION['user']['name']) ?
    $_SESSION['user']['name'].' '.$_SESSION['user']['lastName'] :
    $_SESSION['user']['login']
  ?>
</h2>
<form action="" method="POST">
  <button type="submit" name="btn_logout"> Выйти из учетной записи </button>
</form>
<hr>
<div>
  <h4>Ваши текущие заказы:</h4>
  <ul>
    <?php foreach ($orders as $order) : ?>
      <li>Номер заказа: <?=$order['id']?>, Дата заказа: <?=$order['date']?>, Сумма заказа: <?=$order['sum']?></li>
    <? endforeach; ?>
  </ul>
</div>
<? if (isset($_COOKIE['basket'])) : ?>
  <form action="" method="POST">
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" required value="<?=$_SESSION['user']['name']?>"> <br>
    <label for="lastname">Фамилия</label>
    <input type="text" id="lastname" name="lastname" required value="<?=$_SESSION['user']['lastName']?>"> <br>
    <label for="login">Логин</label>
    <input type="text" id="login" value="<?=$_SESSION['user']['login']?>"> <br>
    <label for="phone">Контактный телефон</label>
    <input type="text" id="phone" name="phone" required> <br>
    <button type="submit" name="btn_order">Подтвердить заказ</button>
  </form>
<? endif; ?>
