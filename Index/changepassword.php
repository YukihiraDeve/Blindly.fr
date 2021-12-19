<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BlindLy</title>
    <link rel="stylesheet" href="style_room.css">
    <link rel="text/css" href="/css/bootstrap.min.cs">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style media="screen">
      .container{
        padding-top: 15%;
      }
    </style>
  </head>
  <body class="bg-dark body">
    <?php

    if (isset($_POST['new']) && isset($_POST['check']) && !empty($_POST['new']) && !empty($_POST['check'])) {
      $new = hash('md5' , $_POST['new']);
      $check = hash('md5' , $_POST['check']);

      if ($new != $check) {
        header('location: changepassword.php?message=Les mots de passe ne correspondent pas');
        exit;
      }

      include('../db.php');


      $q = 'UPDATE users SET password = :password WHERE email = :email';
      $req = $db->prepare($q);
      $resultat = $req->execute([
        'email' => $_SESSION['email'],
        'password' => $new
      ]);

      if ($resultat) {
        header('location: ../Center/index.php?Changement de mot de passe réussi');
        exit;
      } else {
        header('location: changepassword.php?Changement de password echoué');
        exit;
      }
    }

     ?>
    <div class="container">
      <form method="post" action="changepassword.php" class="col">
        <div class="form-group">
          <div class="row">
            <input class="form-control" type="password" name="new" placeholder="Nouveau mdp">
          </div>
          <br>
          <div class="row">
            <input class="form-control" type="password" name="check" placeholder="Confirmez le nouveau mdp">
          </div>
          <br>
          <div class="row">
            <input class="btn-warning btn-lg" type="submit">
          </div>
        </div>
     </form>
    </div>
  </body>
</html>
