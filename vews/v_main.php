<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ДЗ к уроку 6</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header">
    <ul class="menu">
      <li><a href="/">Главная страница</a></li>
      <li><a href="./index.php?page=catalog">Каталог</a></li>
      <li><a href="./index.php?page=gallery">Фотогалерея</a></li>
      <li><a href="./index.php?page=calculator">Калькулятор</a></li>
      <li><a href="./index.php?page=feedback">Отзывы</a></li>
      <li><a href="./index.php?page=registration"><?=isset($_SESSION['user']) ? 'Мой кабинет' : 'Регистрация'?></a></li>
    </ul>
  </header>
  <?=$content?>
</body>
</html>