<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Room </title>
  <scss> </scss>
  <link rel="stylesheet" href="style_room.css">
  <link rel="text/css" href="/css/bootstrap.min.cs">
  <link rel="stylesheet" href="/css/bootstrap.css">

</head>

<body class="bg-dark body">

<?php include('../includes/header.php') ?>


  <main class="row">

    <div class="col-xl-2 col-lg-0 col-xs-0 col-md-0 col-sm-0"></div>

    <div class="col-md-10">

      <!-- BOX -->

      <div class="row boxe bg-dark">

        <div class="col-md-12 col-xs-12 row bg-dark">

          <div class="row container-fluid espacement ligne1">

            <div onclick="normalSelector()" class="dtow col-2 blanc boxy">
              <div class="wtod row text-md-center py-4 text-light">
                <h3 class="change text-center"> NORMAL </h3>
              </div>
              <div class="wtod row text-md-center text-light">
                <p>Trouvez le nom de l’artiste Ou le nom de la musique ! </p>
              </div>
            </div>

            <!-- ------------- -->


            <div onclick="changeColor()" class="btow col-2 bleu boxy">

              <div class="wtob row text-primary text-md-center py-4">
                <h4 class="change text-center"> RAPIDO'QUIZZ </h4>
              </div>

              <div class="row text-light text-center ">
                <p> EN COURS DE DEVELOPPEMENT </p>
              </div>

            </div>

            <!-- -------------- -->

            <div onclick="colorRoyale()" class="dtor col-2 rouge boxy">
              <div class="rtow row text-danger text-md-center py-4">
                <h4 class="text-center"> BATTLE'ROYALE </h4>
              </div>

            <div class="rw text-light text-center ">
              <p> EN COURS DE DEVELOPPEMENT </p>
            </div>
        </div>

        </div>


        <div class="row ligne2">

          <div class="col-xl-6 col-lg-12 col-md-10 col-xs-10 col-sm-8 text-light cat">

            <div class="col-10">

              <label class="label"> Genre musical : </label>

              <select id="numberSelect" class="form-select form-select-sm" aira-label="Defaut select example">
                <option class="selection" onclick="rock()" value="1"> Rock </option>
                <option class="selection" onclick="pop()" value="2"> Rap </option>
                <option class="selection" onclick="rock()" value="4"> Dessin animé </option>
              </select>
              
              <br>

              <label class="label"> Nombre de rounds </label>

              <select id="Round" class="form-select form-select-sm" aira-label="Defaut select example">
                <option value="5" selected> 5 </option>
                <option value="10"> 10 </option>
                <option value="15"> 15 </option>
                <option value="20"> 20 </option>
                <option value="25"> 25 </option>
              </select>

            </div>

          </div>

          <div class="col-lg-5 col-md-6 col-xs-10 col-sm-10"> 

            <div class="start col-10">

              <h1 onclick="changement()" class="text-white text-center"> DEMARRER LA PARTIE</h1> 

            </div>

          </div>



          </div>
    </div>
</div>
  </div>

  <div class="col-lg-2 col-md-0 col-sm-0"></div>



  </main>

</body>

<script src="/JS/header.js"> </script>
<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>