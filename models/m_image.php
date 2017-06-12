<?php
  $image = getImages($_GET['id'])[0];
  $click = $_GET['click'] + 1;
  addClick($_GET['id'], $click);
?>
