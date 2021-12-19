<?php
include('../../db.php');
include('admincheck.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blindly</title>
    <link rel="icon" href="../../favicon.png" />
  </head>
  <body>
    <h1>Promouvoir les droits d'un Utilisateur</h1>
    <form action="promote.php" method="post">
      <input type="text" name="pseudo">
      <input type="submit">
    </form>
    <?php

    if (isset($_GET['message']) && !empty($_GET['message'])) {
      echo $_GET['message'];
    }

    ?>
  </body>
</html>
