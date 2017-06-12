<?php
  $message = '';
  if (isset($_POST['send'])) {
    if ($_FILES['userfile']['error']) {
      $message = 'Ошибка загрузки файла!';
    } elseif ($_FILES['userfile']['size'] > 1000000) {
      $message = 'Файл слишком большой';
    } else {
      $name = translit($_FILES['userfile']['name']);
      $pathBig = PHOTO.$name;
      if (copy($_FILES['userfile']['tmp_name'], $pathBig)) {
        $pathSmall = PHOTO_SMALL.$name;
        $type = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
        changeImage(150, 150, $_FILES['userfile']['tmp_name'], $pathSmall, $type);
        addImageInDb($pathBig, $pathSmall, $_FILES['userfile']['size'], $name, 0);
      } else {$message = 'Ошибка загрузки файла!';}
    }
  }
  $images = getImages();
?>
