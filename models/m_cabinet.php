<?php
  if (isset($_POST['btn_logout'])) {
    unset($_SESSION['user']);
    header('Location: ./index.php');
  }

  if (isset($_POST['btn_order'])) {
    $user['name'] = (string)htmlspecialchars(strip_tags(trim($_POST['name'])));
    $user['lastName'] = (string)htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    $user['phone'] = (string)htmlspecialchars(strip_tags(trim($_POST['phone'])));
    updateUser($user, $_SESSION['user']['login']);
    setInOrder($_SESSION['user']['login'], $_COOKIE['basket']['sum']);
    $id = getOrder($_SESSION['user']['login'])[0]['id'];
    $goods = getGoodsBasket($_COOKIE['basket']);
    foreach ($goods as $product) {
      setGoodsInBasket($id, $product);
      setcookie("basket[$product[id]]", '', time()-1000);
    }
    setcookie("basket[sum]", '', time()-1000);
    header("Location: ./index.php?page=cabinet");
  }

  $orders = getOrder($_SESSION['user']['login']);
?>
