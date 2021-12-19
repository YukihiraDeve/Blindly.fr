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
    <link rel="icon" href="../favicon.png" />
  </head>
  <body class="bg-dark body" style="padding-top:13%;">
    <h1 class="text-center text-white" style="font-size:90px;">BLINDLY</h1>
    <br>
    <div class="container">
      <form method="post" action="changepseudo.php" class="col">
        <div class="row">
          <input class="form-control" type="text" name="pseudo" placeholder="votre nouveau pseudo" autocomplete="off">
        </div>
        <br>
        <div class="row">
          <input class="form-control" type="password" name="password" placeholder="Votre mot de passe" autocomplete="off">
        </div>
        <br>
        <div class="row">
          <input class="btn-warning btn-lg" type="submit">
        </div>
      </form>
    </div>
  </body>
</html>
