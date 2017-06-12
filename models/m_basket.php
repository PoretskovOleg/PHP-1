<?php
  if (isset($_POST['btn_change']) && (int)$_POST['quantity'] > 0) {
    $sum = $_COOKIE['basket']['sum'] - getGoods($_GET[id])[0]['price'] * ($_COOKIE['basket'][$_GET[id]] - $_POST['quantity']);
    $quantity = $_POST['quantity'];
    setcookie("basket[$_GET[id]]", "$quantity");
    setcookie("basket[sum]", "$sum");
    header('Location: ./index.php?page=basket');
  }

  if (isset($_POST['btn_delete'])) {
    $sum = $_COOKIE['basket']['sum'] - $_COOKIE['basket'][$_GET[id]] * getGoods($_GET[id])[0]['price'];
    setcookie("basket[$_GET[id]]", "", time() - 1000);
    setcookie("basket[sum]", "$sum", $sum == 0 ? time()-1000 : 0);
    header('Location: ./index.php?page=basket');
  }

  if (isset($_POST['btn_to_order']) && isset($_COOKIE['basket'])) {
    if (isset($_SESSION['user']))
    header('Location: ./index.php?page=cabinet');
    elseif (!isset($_SESSION['user']) && isset($_COOKIE['user'])) {
      $user = getUserLogin($_COOKIE['user']['login'])[0];
      if ($user['pass'] === $_COOKIE['user']['pass']) {
        $_SESSION['user'] = $user;
        header('Location: ./index.php?page=cabinet');
      }
    } else header('Location: ./index.php?page=registration');
  }

  $goodsInBasket = isset($_COOKIE['basket']) ? getGoodsBasket($_COOKIE['basket']) : array();
  $totalPrice = isset($_COOKIE['basket']['sum']) ? $_COOKIE['basket']['sum'] : '0';
?>
