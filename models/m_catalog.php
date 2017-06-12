<?php
  if (isset($_POST['btn_basket'])) {
    $sum = $_COOKIE['basket']['sum'] + getGoods($_GET[id])[0]['price'];
    $quantity = $_COOKIE['basket'][$_GET[id]] + 1;
    setcookie("basket[$_GET[id]]", "$quantity");
    setcookie("basket[sum]", "$sum");
    header('Location: ./index.php?page=catalog');
  }
  $goods = getGoods();
  $quantityGoodsBasket = isset($_COOKIE['basket']) ? count($_COOKIE['basket']) - 1 : '0';
  $sumBasket = isset($_COOKIE['basket']) ? $_COOKIE['basket']['sum'] : '0';
?>
