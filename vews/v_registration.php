<p><a href="/">Главная</a> / Регистрация</p>
<div class="header">
  <h1><?=$title?></h1>
</div>
<p>Если Вы уже зарегистрированы, то выполните <a href="./index.php?page=login">ВХОД</a> </p>
<form action="" method="POST">
  <label for="name">Имя</label> <br>
  <input type="text" id="name" name="name" placeholder="русские или латинские буквы"> <span><?=$message['name']?></span> <br>
  <label for="lastname">Фамилия</label> <br>
  <input type="text" id="lastname" name="lastname" placeholder="русские или латинские буквы"> <span><?=$message['lastName']?></span> <br>
  <label for="email">E-mail</label><br>
  <input type="email" id="email" name="email"> <span><?=$message['email']?></span> <br>
  <label for="login">Логин</label><br>
  <input type="text" id="login" name="login" required> <span><?=$message['login']?></span> <br>
  <p>логин не более 20 символов и может содержать только латинские буквы, цифры, знаки '_' и '-' </p>
  <label for="pass">Пароль</label><br>
  <input type="password" id="pass" name="pass" required placeholder="не менее 6 и не более 20 символов"> <span><?=$message['pass']?></span> <br>
  <label for="pass2">Повторите пароль</label><br>
  <input type="password" id="pass2" name="pass2"> <span><?=$message['pass2']?></span> <br>
  <input type="checkbox" name="rememberme"> Запомнить меня  <br>
  <button type="submit" name="btn_reg">Зарегистрироваться</button>
</form>
