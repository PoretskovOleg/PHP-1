<p><a href="/">Главная</a> / Авторизация</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<form action="" method="POST">
  <label for="login">Логин</label><br>
  <input type="text" id="login" name="login" required> <br>
  <label for="pass">Пароль</label><br>
  <input type="password" id="pass" name="pass" required> <br>
  <input type="checkbox" name="rememberme"> Запомнить меня  <br>
  <button type="submit" name="btn_login">Войти</button>
</form>
<span><?=$message?></span>
