<?php


if (isset($_POST['email']) && !empty($_POST['email'])) {
  $mail =  $_POST['email'];

  $key = rand(10000, 99999);
  session_start();

  $_SESSION['key'] = $key;

  $_SESSION['email'] = $_POST['email'];

  $msg = "Voici votre code de verification : $key";

  $msg = wordwrap($msg,70);

  //Envoie de mail

  mail($mail,"Changement de mot de passe Blindly",$msg);

  header('location: resetpassword.php');
  exit;
};
?>
