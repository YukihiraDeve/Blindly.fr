<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_mail.css">
    <link rel="text/css" href="/css/bootstrap.min.cs">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body class="bg-dark">

<div class="row">
    <div class="row">

      <div class="col-4">
      </div>

      <div class="col-4">
          <div class="boxy">

            <h4 class="text-white text-center"> Changement de mot de passe </h4>

            <figcaption class="blockquote text-white fs-6 text-center">
            Un mail à été envoyé à l'adresse renseignée
            </figcaption>
            <?php

            if (isset($_POST['key']) && !empty($_POST['key'])) {
              if ($_POST['key'] == $_SESSION['key']) {
                header('location: changepassword.php');
                exit;
              } else {
                $_GET['message'] = "<p class='text-white'>Clé de verification incorrecte</p>";
              }
            }

            if (isset($_GET['message']) && !empty($_GET['message'])) {
              echo $_GET['message'];
            }

            ?>
            <div class="form-outline boxy-input">
              <form class="form-inline" method="post">
                <div class="form-group mx-sm-3 mb-2">
                  <input class="form-control" type="text" name="key" placeholder="Entrez la clé de Verification">
                  <br>
                  <input type="submit" class="btn btn-warning mb-1">
                </div>
              </form>
              <a href="#">Envoyer une nouvelle clé</a>
            </div>

          </div>
      </div>

      <div class="col-4">
      </div>

    </div>


</div>


</body>
</html>
