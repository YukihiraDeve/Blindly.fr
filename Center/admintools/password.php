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
      <form method="post" action="changepassword.php" class="col">
          <div class="row">
            <input class="form-control" type="password" name="password" placeholder="Votre mdp">
          </div>
          <br>
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
     </form>
    </div>
    </div>
  </body>
</html>
