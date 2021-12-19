<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Game </title>
    <link rel="text/css" href="/css/bootstrap.min.cs">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>


<video autoplay muted loop id="myVideo">
  <source src="Video.mp4" type="video/mp4">
</video>



    <body onload="storage()">


    <div class="content">
      <div class="url">
        <?php
        session_start();
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        //echo "<h1>$url</h1>";
        $array = explode('/',$url);
        $room = $array[5];
        $_SESSION['room'] = $room;
        ?>
      </div>
    <main class="row">

        <div class="col-xl-3 col-lg-0 col-md-0 col-sm-0 col-xs-0">

        </div>

        <div class="col-xl-6 col-lg-10 col-md-12 col-sm-12">

        <div class=" carte">
            <h1 class="text-white text-center center"> <strong> Partie terminé </strong></h1>


            <div id="display-points">

                <h5 id="textPoints" class="padding-number text-white "> <strong> Votre nombre de points : </strong> </h5>
                <h5 id="points" class="padding-none col-1 text-white"> <strong> 0 </strong> </h5>

                <h5 id="serverResponse" class="padding-none text-white"> </h5>

            </div>

            <div class="d-grid gap-2">
            <button onclick="window.location.href='classement.php'" type="button" class="btn-lg  btn-light retour"> Consulter le classement </button>

            <button onclick="window.location.href='/Center/index.php'" type="button" class="btn-lg  btn-light retour"> Retour à l'acceuil </button>
            </div>

        </div>

        </div>

        <div class="col-xl-3 col-lg-12 col-md-0 col-sm-0 col-xs-0">

        </div>

    </main>

    </div>

</body>
<script src="code.js"> </script>
</html>
