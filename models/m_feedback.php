<?php
  if (isset($_POST[btn_feedback]) && $_POST[text]) {
    $user = isset($_SESSION[user]) ? $_SESSION[user][login] : 'Гость';
    $text = (string)htmlspecialchars(strip_tags($_POST[text]));
    setFeedback($user, $text);
  }
?>
