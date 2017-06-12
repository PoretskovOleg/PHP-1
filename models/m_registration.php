<?php
  if (isset($_POST['btn_reg'])) {
    $message = array();
    // Проверка Имени
    if ($_POST['name']) {
      if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $_POST['name'])) {
        $message['name'] = 'Можно вводить только русские или латинские буквы';
      } else $user['name'] = (string)htmlspecialchars(strip_tags(trim($_POST['name'])));
    }
    // Проверка Фамилии
    if ($_POST['lastname']) {
      if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $_POST['lastname'])) {
        $message['lastName'] = 'Можно вводить только русские или латинские буквы';
      } else $user['lastName'] = (string)htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    }
    // Проверка почты
    if ($_POST['email']) {
      if (!preg_match('/^([a-z0-9_.-]{1,20})@([a-z0-9.-]{1,20})\.([a-z]{2,4})$/i', $_POST['email'])) {
        $message['email'] = 'Ваша электронная почта не корректна';
      } else $user['email'] = (string)htmlspecialchars(strip_tags(trim($_POST['email'])));
    }
    // Проверка Логина
    if (!preg_match('/^[a-z][a-z0-9_-]{1,20}$/i', $_POST['login'])) {
      $message['login'] = 'Ваш логин не корректен';
    } elseif (count(getUserLogin($_POST['login'])) > 0) {
      $message['login'] = 'Такой логин уже существует';
    } else $user['login'] = (string)htmlspecialchars(strip_tags(trim($_POST['login'])));
    // Проверка пароля
    if (!preg_match('/^[^ ]{6,20}$/', $_POST['pass'])) {
      $message['pass'] = 'Ваш пароль некорректен';
    } elseif ($_POST['pass'] !== $_POST['pass2']) {
      $message['pass2'] = 'Вы ввели разные пароли';
    } else $user['pass'] = md5($_POST['pass']);
    // Если проверка пройдена, то сохраняем в БД, куки и сессии
    if (count($message) == 0) {
      setUser($user);
      if (isset($_POST['rememberme'])) {
        setcookie('user[login]', $user['login'], time()+3600);
        setcookie('user[pass]', $user['pass'], time()+3600);
        setcookie('user[name]', $user['name'], time()+3600);
        setcookie('user[lastName]', $user['lastName'], time()+3600);
      }
      $_SESSION['user'] = $user;
    }
  }

  if (isset($_SESSION['user'])) header('Location: ./index.php?page=cabinet');
?>
