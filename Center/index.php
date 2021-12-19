<?php
include('../includes/check.php');
include('../db.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> BlindLy </title>
  <link rel="stylesheet" href="style_room.css">
  <link rel="text/css" href="/css/bootstrap.min.cs">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="icon" href="../favicon.png" />
</head>

<body class="bg-dark body">

  <script type="text/javascript">
    setTimeout(getLocation, 500);
    /*
      if (window.location.href == 'https://blindly.fr/Center/index.php') {
        getLocation();
      }
    */
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
          //console.log("latitude =  " + latitude);
          //console.log("longitude =  " + longitude);

          const req = new XMLHttpRequest();
          req.onreadystatechange = function () {
            if (req.readyState == 4) {

            }
          };
          req.open("POST", "location.php");
          req.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
          // Le format d'envoie est le suivant: K1=v1&K2=v2&K3=v3....
          req.send(`latitude=${latitude}&longitude=${longitude}`);
        })
      } else {
        console.log("Geolocation not supported by browser");
      }
    }

    function admin(){
      window.location.href='admintools/index.php';
    }
  </script>

  <?php include('../includes/header.php')?>

  <section class="space-top">
    <main>
      <div class="row contenu1">

        <div class="col-md-6 col-sm-12 col-xs-0 bg-dark d-flex logoPos">

          <div class="container">
            <div class="equalizer">
              <div id="bar1" class="bar"></div>
              <div id="bar2" class="bar"></div>
              <div id="bar3" class="bar"></div>
              <div id="bar4" class="bar"></div>
              <div id="bar5" class="bar"></div>
              <div id="bar6" class="bar"></div>
              <div id="bar7" class="bar"></div>
              <div id="bar8" class="bar"></div>
              <div id="bar9" class="bar"></div>
              <div id="bar10" class="bar"></div>
            </div>
          </div>

        </div>

        <div class="col-md-5 col-sm-12 col-xs-9 bg-dark">

          <div class="row align-items-center">

            <div class="d-flex flex-column m-2 limite">

              <div class="contenu">

                <h1 class="text-white text-center text-uppercase fw-bold fs-1"> Joue à Blindly </h1>
                <h1 class="text-white text-center text-uppercase fw-bold fs-3"> Gratuitement </h1>

              </div>
              <button type="button" class="btn btn-warning btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                data-toggle="modal" data-target="#moda1"> Creer une ROOM </button>


              <button type="button" class="vague btn btn-info btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                data-toggle="collapse" data-target="#target1"> Rejoins tes amis ! </button>

              <div class="collapse" id="target1">
                <br>
                <form action="join.php" method="POST">
                  <input type="text" class="form-control" placeholder="Marquez l'ID de la room" id="idRoom"
                    name="roomID" />
                  <submit type="submit" value="Envoyer" id="" />
                </form><br>
              </div>

              <!-- <button type="button" class="vague btn btn-success btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                onclick="window.location.href='/Room/modele/room.html'"> Jouer seul(e) !</button> -->

              <button type="button"
                class="vague btn btn-secondary btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                onclick="window.location.href='/classement/index.php'"> Recherche et liste de joueurs </button>

              <button type="button" class="vague btn btn-success btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                onclick="window.location.href='/Room_PHP/room.php'"> Jouer solo ! </button>

              <?php
              $q = "SELECT id FROM users WHERE email = :email AND admin = 1";
              $req = $db->prepare($q);
              $admin = $req->execute([
              	'email' => $_SESSION['email']
              ]);
              $admin = $req->fetch(PDO::FETCH_ASSOC);

               if ($admin) {
                echo "<button type='button' class='vague btn btn-danger btn-lg button2 text-white fs-4 text-uppercase fw-bold'
                  onclick='admin()'> ADMIN TOOLS</button>";
               }
               ?>



            </div>
          </div>

        </div>

        <div class="modal fade" id="moda1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <!-- Tete du modal -->
              <div class="modal-header">
                <h4 class="modal-title"> Créer une room </h4>
              </div>

              <!-- Corp du modal -->

              <div class="modal-body">

                <form action="create.php" method="post">
                  <label class="label"> Nom de la ROOM </label>
                  <br>
                  <input type="text" name="roomname" placeholder="Nom de la room">

                  <br>

                  <label class="label"> Genre musical : </label>

                  <select id="numberSelect" class="form-select form-select-sm" aira-label="Defaut select example"
                    name="type">
                    <option class="selection" value="ROCK"> Rock </option>
                    <option class="selection" value="RAP"> Rap </option>
                    <option class="selection" value="DESSIN_ANIME"> DESSIN ANIME </option>

                  </select>

                  <br>

                  <label class="label"> Nombre de rounds </label>

                  <select id="Round" class="form-select form-select-sm" aira-label="Defaut select example" name="round">
                    <option value="1" > 1 </option>
                    <option value="5" selected> 5 </option>
                    <option value="10"> 10 </option>
                    <option value="15"> 15 </option>
                    <option value="20"> 20 </option>
                    <option value="25"> 25 </option>
                  </select>

                  <br>

                  <div class="d-grid gap-2">

                  <div onclick="changement()">

                    <button class="btn btn-lg btn-dark" onclick="window.location.href=#"> Click </button>

                  </div>

                  </div>
                </form>

              </div>

            </div>
          </div>

  </section>
  <div class="col-md-2 bg-dark">

  </div>

  </div>

  </main>

  <section>

    <div class="contenu2 bg-primary">

      <div class="container">
        <div id="demo" class="carousel carousel-fade">
          <!-- Indicateurs -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0"></li>
            <li data-target="#demo" data-slide-to="1" class="active"></li>
          </ul>

          <!-- Carrousel -->
          <div class="carousel-inner">
            <div class="carousel-item">

              <?php

        include('../db.php');

        $select = 'SELECT * FROM users WHERE email = :email';

        $reqid = $db->prepare($select);
        $reqid->execute([
            'email' => $_SESSION['email']

        ]);

        $res = $reqid->fetch();

        $_SESSION['pseudo'] = $res['pseudo'];


        ?>



              <!-- -- Dans le premier carrou --  -->

              <div class="card-body bg-dark first_carrou">

                <h2 class="text-white text-center"> Classement </h2>

                <div class="row">

                  <div class="col-2"></div>

                  <div class="col-8">

                    <?php

                    $query = "SELECT pseudo, total_score, game_played FROM users ORDER BY total_score DESC LIMIT 5";
                    $request = $db->prepare($query);
                    $request->execute();
                    $response = $request->fetchAll();
                     ?>

                    <table cellpadding="0" cellspacing="0" border="0"
                      class="table table-striped table-hover table-condensed" id="results-table">
                      <thead>
                        <th>Rang</th>
                        <th>Pseudo</th>
                        <th>Points totaux</th>
                        <th>Parties Jouées</th>
                      </thead>
                      <tbody>
                        <?php

                        for ($i=0; $i <= 4; $i++) {
                          $y = $i + 1;
                          echo "<tr>";
                          echo "<td>$y - </td>";
                          echo '<td>' . $response[$i][0] .'</td>';
                          echo '<td>' . $response[$i][1] . '</td>';
                          echo '<td>' . $response[$i][2] . '</td>';
                          echo "</tr>";
                        }

                         ?>
                      </tbody>
                    </table>



                  </div>

                  <div class="col-2"></div>




                </div>
              </div>

              <!-- Contrôles -->
              <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>


            </div>





            <div class="carousel-item active bg-dark">

              <div class="row">

                <div class="col-1"></div>

                <div class="col-10">

                  <section class="section about-section dark-bg" id="about">
                    <div class="container">
                      <div class="row align-items-center flex-row-reverse">
                        <div class="col-lg-6">
                          <div class="about-text go-to">
                            <h3 class="dark-color text-white">Votre profil</h3>

                            <div class="row about-list">
                              <div class="col-md-10">
                                <div class="media">
                                  <label class="fs-5 text-white"> Pseudo : <?php echo "$_SESSION[pseudo]"; ?> </label>
                                  <a href="pseudo.php" class="text-warning">Changement de pseudo</a>
                                </div>
                                <div class="media">
                                  <label class="fs-6 text-white"> Email : <?php echo "$res[email]"; ?> </label>
                                </div>

                                <div class="media">

                                  <a href="password.php" class="text-warning">Changement de mot de passe</a>
                                </div>

                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="about-avatar">
                            <?php echo "<img src='../uploads/$res[image]' width='150px'>"; ?>
                          </div>
                          <br>
                          <form action="donnees.php" method="post" class="form-control" enctype="multipart/form-data">
                            <input type="file" name="pic">

                            <input type="submit" value="Change ta photo !">
                          </form>
                        </div>
                      </div>
                      <div class="counter">
                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <div class="count-data text-center bg-white">
                              <h6 class="count h2" data-to="500" data-speed="500"><?php echo "$res[game_played]"; ?></h6>
                              <p class="m-0px font-w-600">Nombre de parties</p>
                            </div>
                          </div>
                          <div class="col-6 col-lg-3">
                            <div class="count-data text-center bg-white">
                              <h6 class="count h2" data-to="150" data-speed="150"><?php echo "$res[total_score]"; ?></h6>
                              <p class="m-0px font-w-600">Nombre de points</p>
                            </div>
                          </div>
                          <div class="col-6 col-lg-3 bg-white">
                            <div class="count-data text-center">
                              <h6 class="count h2" data-to="850" data-speed="850"><?php echo "$res[top]"; ?></h6>
                              <p class="m-0px font-w-600"> Nombre de TOP 1</p>
                            </div>
                          </div>
                          <div class="col-6 col-lg-3">
                            <div class="count-data text-center bg-white">
                              <h6 id="date" class="count h2" data-to="190" data-speed="190"><?php echo "$res[date_inscription]"; ?></h6>
                              <p class="m-0px font-w-600">Date de création</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                </div>

              </div>

              <div class="col-1"></div>

            </div>

            <!-- Contrôles -->
            <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

          </div>


  </section>


  <?php include('../includes/footer.php')?>
  <!-- <section class="bg-dark alias">

    <div class="card-header">
      <h1 class="card-title text-white text-center">
        Alias
      </h1>
    </div>
  </section> -->


</body>

<script src="code.js"> </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
