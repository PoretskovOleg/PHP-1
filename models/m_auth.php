<?php
  if (isset($_POST['btn_login'])) {
    $user = getUserLogin($_POST['login'])[0];
    if ($user['pass'] === md5($_POST['pass'])) {
      $_SESSION['user'] = $user;
      if (isset($_POST['rememberme'])) {
        setcookie('user[login]', $user['login'], time()+3600);
        setcookie('user[pass]', $user['pass'], time()+3600);
        setcookie('user[name]', $user['name'], time()+3600);
        setcookie('user[lastName]', $user['lastName'], time()+3600);
      }
      header('Location: ./index.php?page=cabinet');
    } else $message = 'Такого пользователя не существует!';
  }
?>