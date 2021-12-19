<?php
include('../../db.php');
include('admincheck.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blindly</title>
    <link rel="icon" href="../../favicon.png" />
  </head>
  <style media="screen">
    h3{
      text-decoration: underline;
      color: red;
    }
  </style>
  <body>
    <a href="bestplayers.php">Meilleurs joueurs</a>
    <?php



    $q = 'SELECT * FROM users WHERE id >= all (SELECT id FROM users ORDER BY id DESC)';
    $req = $db->prepare($q);
    $req->execute();
    $response = $req->fetch();

    $maxid = $response['id'];

    echo '<h3> Administrateurs </h3>';
    $a = 1;
    for ($i = 1; $i <= $maxid ; $i++) {
      $q = "SELECT * FROM users WHERE id = $i AND admin = 1";
      $req = $db->prepare($q);
      $req->execute();
      $admins = $req->fetch();

      if ($admins) {
        echo "<p>Admin $a</p>
              <p>Mail : $admins[email]<p>
              <p>Pseudo : $admins[pseudo]<p>
              <br>";
        $a += 1;
      }

    }


    echo '<h3> Utilisateurs verifiés :</h3>';
    $y = 1;
    for ($i = 1; $i <= $maxid ; $i++) {
      $q = "SELECT * FROM users WHERE id = $i AND validate = 1";
      $req = $db->prepare($q);
      $req->execute();
      $users = $req->fetch();

      if ($users) {
        echo "<p>Utilisateur $y</p>
              <p>Mail : $users[email]<p>
              <p>Pseudo : $users[pseudo]<p>
              <br>";
        $y += 1;
      }

    }

    echo '<h3> Comptes non-verifiés :</h3>';
    for ($i = 1; $i <= $maxid ; $i++) {
      $q = "SELECT * FROM users WHERE id = $i AND validate = 0";
      $req = $db->prepare($q);
      $req->execute();
      $users = $req->fetch();

      if ($users) {
        echo "<p>Mail : $users[email]<p>
              <p>Pseudo : $users[pseudo]<p>
              <br>";
      }

    }
     ?>
  </body>
</html>
