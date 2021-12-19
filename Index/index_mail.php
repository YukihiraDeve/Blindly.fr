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

            <h4 class="text-white text-center"> Merci de vérifier votre compte </h4>

            <figcaption class="blockquote text-white fs-6 text-center">
            Par email à l'adresse suivante : <cite title="Source Title"><?php echo $_SESSION['email'] ?> </cite>
            </figcaption>
            <?php

            if (isset($_POST['key']) && !empty($_POST['key'])) {
              if ($_POST['key'] == $_SESSION['key']) {
                header('location: validateaccount.php');
                exit;
              } else {
                header('location: index_mail.php?message=Clé de validation incorrecte');
                exit;
              }
            }

            if (isset($_GET['message']) && !empty($_GET['message'])) {
              echo $_GET['message'];
            }

            ?>
            <div class="form-outline boxy-input">
              <form class="form-inline" method="post">
                <div class="form-group mx-sm-3 mb-2">
                  <input class="form-control" type="text" name="key" placeholder="Entrez votre clé de validation de compte">
                  <br>
                  <input type="submit" class="btn btn-warning mb-1">
                </div>
              </form>
              <a href="sendmail2.php">Envoyer une nouvelle clé</a>
            </div>

          </div>
      </div>

      <div class="col-4">
      </div>

    </div>


</div>


</body>
</html>
