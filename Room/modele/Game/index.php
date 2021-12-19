<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Game </title>
  <link rel="text/css" href="/css/bootstrap.min.cs">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <script src="ajax.js"> </script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

</head>



<body class="bg-dark">

<header>

<div class="">
  <nav class="navbar navbar-expand-lg bg-dark justify-content-md-between">

    <ul class="navbar stock mt-1 ">

      <li class="nav-item-active">

        <img class="togglemenu" data-toggle="collapse" data-target="#navbarToggleExternalContent"
          aria-controls="navbarToggleExternalContent" aria-label="Toggle navigation"
          src="/Images/toggle-menu-icon-png-8-Transparent-Images.png">

      </li>
      <li class="nav-item-active">
        <a class="nav-link navbar-brand " href="/index.html">
          <h2 class="slogan nav-item blindly"> BlindLy </h2>
        </a>

      </li>
    </ul>

  </nav>

  <div class="row pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-dark p-4">
        <h5 class="text-white h4"> Paramètres de la page </h5>
        <span class="text-muted">
          <label class="form-label" for="customRange2"> Réglez le son de la page</label>
          <div class="col-3" <div class="range">

            <input type="range" class="form-range" min="0" max="20" id="customRange2" onclick="settingsSound()" />
            <div>
            </div>
        </span>



        <h5 class="text-danger h4 parametre"><a id="ahrefDisconnect" href="/disconnect.php" style="color:red;">Déconnexion</a></h5>
        <span class="text-muted"> Vous reviendez sur la page de connexion </span>
      </div>
    </div>

  </div>

</div>

</header>

  <main>

    <?php include('db.php'); ?>

    <div id="serverResponse">
    
    </div>

    <audio id="music" class="invisible" autoplay onload src="" type="audio/mp3">
    </audio>

    <div class="progress space" style="height:55px;">

      <div id="bar" class="progress-bar bg-warning" role="progressbar" aria-valuenow="57%" aria-valuemin="0"
        aria-valuemax="57">

      </div>

    </div>

    <br>


    <div class="container">

      <div class="row">

        <div class="col-1">
        </div>

        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 col-xl-6">
          <div class="col-4">
          </div>

      <form id="myForm" onsubmit="return false;">
          <div id="hidden" class="form-floating reponse mb-lg-3">

            <input onkeyPress="if(event.keyCode == 13){ getValue(); Validation() ;}" type="text" class="form-control in visible"
              id="floatingInput" id="in"  autocomplete="off">
            <label id="labelInput" class="fs-6 fw-light" for="floatingInput"> Donnez la réponse - SANS CARACTERE SPECIAUX </label>

            </div>
            <h6 id="reponseNot" class="text-white"> </h6>
      </form>
          
      <div id="reponseDiv" class="card card-body invisible">
        <h6 id="reponseGame" class="text-dark text-center"> </h6>
      </div>
        </div>
        
          <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">

          </div>
      
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-4 col-xl-4">

            <div class="card">
              <div id="old_response" class="card-header"> Votre classement </div>
              <div class="card-body"> 

                <div class="row">
                <h6 class="card-title col-8 padding-none"> Vos points : </h6>
                <h6 class="col-1"> </h6> 
                <h6 id="points" class="card-title col-2 padding-none"> 0 <h6>

                <h6 class="card-subtitle"> </h6>
                </div>
              </div>

            </div>

          </div>

          </div>

        </div>


      </div>
    </div>


  </main>
</body>


<script src="game.js"> </script>
<script src="form.js"> </script>

</html>