<?php
  include_once 'models/functions.php';
  include_once 'models/config.php';

  session_start();

  if (!isset($_SESSION['user']) && isset($_COOKIE['user']) ) {
    $user = getUserLogin($_COOKIE['user']['login'])[0];
    if ($user['pass'] === $_COOKIE['user']['pass']) {
      $_SESSION['user'] = $user;
      header('Location: ./index.php?page=cabinet');
    }
  }

  switch ($_GET['page']) {
    case 'login':
      include_once 'models/m_auth.php';
      $content = templator('vews/v_auth.php', 
        array (
          'title' => 'Авторизация',
          'message' => $message
      ));
      break;

    case 'registration':
      include_once 'models/m_registration.php';
      $content = templator('vews/v_registration.php', 
        array (
          'title' => 'РЕГИСТРАЦИЯ',
          'message' => $message
      ));
      break;

    case 'cabinet':
      include_once 'models/m_cabinet.php';
      $content = templator('vews/v_cabinet.php', 
        array (
          'title' => 'МОЙ КАБИНЕТ',
          'orders' => $orders
      ));
      break;

    case 'catalog':
      include_once 'models/m_catalog.php';
      $content = templator('vews/v_catalog.php',
        array(
          'title' => 'КАТАЛОГ ТОВАРОВ',
          'goods' => $goods,
          'quantityGoodsBasket' => $quantityGoodsBasket,
          'sumBasket' => $sumBasket
        ));
      break;

    case 'product':
      include_once 'models/m_product.php';
      $content = templator('vews/v_product.php',
        array(
          'product' => $product,
          'quantityGoodsBasket' => $quantityGoodsBasket,
          'sumBasket' => $sumBasket
        ));
      break;

    case 'basket':
      include_once 'models/m_basket.php';
      if (count($goodsInBasket) > 0) {$title = 'ВАША КОРЗИНА';}
      else {$title = 'ВАША КОРЗИНА ПУСТА';}

      $content = templator('vews/v_basket.php',
        array(
          'title' => $title,
          'goods' => $goodsInBasket,
          'totalPrice' => $totalPrice
      ));
      break;

    case 'gallery':
      include_once 'models/m_gallery.php';
      $content = templator('vews/v_gallery.php',
        array('images' => $images, 'message' => $message, 'title' => 'ФОТО ГАЛЕРЕЯ'));
      break;

    case 'image':
      include_once 'models/m_image.php';
      $content = templator('vews/v_image.php', array('image' => $image, 'click' => $click));
      break;

    case 'feedback':
      include_once 'models/m_feedback.php';
      $content = templator('vews/v_feedback.php', array('title' => 'ОТЗЫВЫ', 'feedbacks' => getFeedback()));
      break;

    case 'calculator':
      $content = templator('vews/v_calculator.php', 
        array(
          'title' => 'КАЛЬКУЛЯТОР',
          'num1' => $_POST[num1],
          'num2' => $_POST[num2],
          'oper' => $_POST[oper],
          'result' => mathOperation($_POST[num1], $_POST[num2], $_POST[oper])
      ));
      break;

    default:
      $content = templator('vews/v_index.php', array('title' => 'ГЛАВНАЯ СТРАНИЦА'));
      break;
  }  

  $page = templator('vews/v_main.php', array('content' => $content));
  echo $page;
?>
