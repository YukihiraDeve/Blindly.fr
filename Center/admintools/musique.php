<?php
include('../../db.php');
include('admincheck.php');
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blindly</title>
  </head>
  <body>
    <form action="addmusique.php" method="post" enctype="multipart/form-data">
      <input type="text" name="style" placeholder="Genre musical">
      <input type="file" name="musique">
      <input type="submit">
    </form>
  </body>
</html>
