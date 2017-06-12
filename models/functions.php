<?php
// Шаблонизатор
  function templator($template, $data = array()) {
    foreach ($data as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include $template;
    return ob_get_clean();
  }
// Получение данных из БД
  function dbSelect($query) {
    $db = mysqli_connect(HOST, LOGIN, PASS, BASE);
    if (!$db) {
      die('Ошибка подключения к базе данных: '.mysqli_connect_error());
    }
    $res = mysqli_query($db, $query);
    if (!$res) {
      echo mysqli_error($db);
    } else {
      $result = mysqli_fetch_all($res, 1);
    }
    mysqli_close($db);
    return $result;
  }
// Изменение данных в БД
  function dbQuery($query) {
    $db = mysqli_connect(HOST, LOGIN, PASS, BASE);
    if (!$db) {
      die('Ошибка подключения к базе данных: '.mysqli_connect_error());
    }
    $res = mysqli_query($db, $query);
    if (!$res) {
      echo mysqli_error($db);
    } 
    mysqli_close($db);
  }
// Транслитор
  function translit($string) {
      $translit = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya');

      return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
   }
// Уменьшение загружаемых картинок
  function changeImage($h, $w, $src, $newsrc, $type) {
    $newimg = imagecreatetruecolor($h, $w);
    switch ($type) {
      case 'jpeg':
        $img = imagecreatefromjpeg($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagejpeg($newimg, $newsrc);
        break;
      case 'jpg':
        $img = imagecreatefromjpeg($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagejpeg($newimg, $newsrc);
        break;
      case 'png':
        $img = imagecreatefrompng($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagepng($newimg, $newsrc);
        break;
      case 'gif':
        $img = imagecreatefromgif($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagegif($newimg, $newsrc);
        break;
    }
  }
// Добавление адресов файлов в БД 
  function addImageInDb($pathBig, $pathSmall, $size, $name, $click) {
    $query = "INSERT INTO photos (name, path_big, path_small, size, click) 
      VALUES ('$name', '$pathBig', '$pathSmall', '$size', '$click')";
    dbQuery($query);
  }
// Получение адресов файлов из БД
  function getImages($id = 0) {
    if ($id) {
      $query = "SELECT path_big FROM photos WHERE id = '$id'";
    } else {
      $query = "SELECT id, path_small, click FROM photos ORDER BY click DESC";
    }
    return dbSelect($query);
  }
// Добавление просмотров картинок в БД
  function addClick($id, $click) {
    $query = "UPDATE photos SET click = '$click' WHERE id = '$id'";
    dbQuery($query);
  }
// Калькулятор
  function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
      case 'plus':
        $result = $arg1 + $arg2;
        break;
      case 'minus':
        $result = $arg1 - $arg2;
        break;
      case 'multiply':
        $result = $arg1 * $arg2;
        break;
      case 'division':
        $result = ($arg2 == 0) ? 'error' : round(($arg1 / $arg2), 2);
        break;
    }
    return $result;
  }
// Получение отзывов из БД
  function getFeedback() { 
    $query = "SELECT date, user, text FROM feedback";
    return dbSelect($query);
  }
// Добавление отзывов в БД
  function setFeedback($user, $text) {
    $query = "INSERT INTO feedback (user, date, text) VALUES ('$user', NOW(), '$text')";
    dbQuery($query);
  }

// Получение товаров из БД
  function getGoods($id = 0) {
    if ($id) {
      $query = "SELECT id, name, price, path_big FROM goods WHERE id = '$id'";
    } else {
      $query = "SELECT id, name, price, path_small FROM goods";
    }
    return dbSelect($query);
  }
// Получение товаров из БД для корзины
  function getGoodsBasket($cookieBasket) {
    unset($cookieBasket['sum']);
    foreach ($cookieBasket as $id => $quantity) {
      $arrayId[] = $id;
    }
    $query = 'SELECT id, name, price FROM goods WHERE id IN ('.implode(',', $arrayId).')';
    $goods = dbSelect($query);
    foreach ($goods as $key => $product) {
      $goods[$key]['quantity'] = $cookieBasket[$product['id']];
      $goods[$key]['total'] = $cookieBasket[$product['id']] * $product['price'];
    }
    return $goods;
  }
  // Добавление покупателя в БД
  function setUser($user) {
    $query = "INSERT INTO users (name, lastName, email, login, pass)
      VALUES ('$user[name]', '$user[lastname]', '$user[email]', '$user[login]', '$user[pass]')";
    dbQuery($query);
  }
  // Поиск пользователя по логину
  function getUserLogin($login) {
    $query = "SELECT * FROM users WHERE login = '$login'";
    return dbSelect($query);
  }
  // Обновление информации о пользователе при заказе
  function updateUser($user, $login) {
    $query = "UPDATE users SET name = '$user[name]', lastName = '$user[lastName]', phone = '$user[phone]' WHERE login = '$login'";
    dbQuery($query);
  }
  // Добавление заказа в БД
  function setInOrder($login, $sum) {
    $query = "INSERT INTO orders (user, sum, date) VALUES ('$login', '$sum', NOW())";
    dbQuery($query);
  }
  // Поиск заказа пользователя
  function getOrder($login) {
    $query = "SELECT * FROM orders WHERE user = '$login' && status = 'new' ORDER BY date DESC";
    return dbSelect($query);
  }
  // Добавление товаров в корзину при заказе
  function setGoodsInBasket($id, $product) {
    $query = "INSERT INTO basket (orderId, productId, quantity, total) VALUES ('$id', '$product[id]', '$product[quantity]', '$product[total]')";
    dbQuery($query);
  }
?>
