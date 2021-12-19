<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Blindly </title>
    <scss> </scss>
    <link rel="text/css" href="css/bootstrap.min.cs">
    <link rel="stylesheet" href="Index/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="code.js"></script>
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

<body class="body bg-dark">

    <!--  <script>
    const validationInput = document.querySelector('input');

        validationInput.addEventListener('input',(e) => {

    if(validationInput.value.length >= 3){
    validationInput.style.borderColor = "green";
    } else {
    validationInput.style.borderColor = "red";
    }

})
</script> -->

    <header class="container-fluid header">


        <ul class="nav justify-content-end">
            <img id="icon" type="button" class="son" src="/Images/logo sound 1.png" onclick="playVid()" width="30px">
        </ul>

        <audio id="MySong" src="/songs/Land – MusicbyAden (No Copyright Music).mp4" type="audio/mp4" autoplay loop>
        </audio>

        <script>
            let son = document.getElementById("MySong");
            let icon = document.getElementById("icon");
            son.volume = 0.050;

            function playVid() {
                if (son.paused) {
                    son.play();
                    icon.src = "/Images/logo sound 1.png";

                } else {
                    son.pause();
                    icon.src = "/Images/sound_off.png";
                }
            }
        </script>

    </header>

    <div class="container" >
        <main class="row">

            <!-- Colonne 1 -->

            <div class="col-md-3 col-xs-1 col-sm-2">


            </div>

            <!-- Colonne 2 -->

            <div class="col-md-6 col-sm-12 col-xs-12 colonne2">
                <div class="d-flex flex-column m-2">

                    <h1 class="text-white text-center blindly text-uppercase fw-bold"> Blind'ly </h1>
                    <br>
                    <button type="button" onclick="Init()"
                        class="btn btn-warning btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                        data-toggle="modal" data-target="#moda2"> Inscris-toi !</button>

                    <button type="button" class="btn btn-info btn-lg button2 text-white fs-4 text-uppercase fw-bold"
                        data-toggle="modal" data-target="#moda1"> Connecte-toi ! </button>

                    <!-- <a href="/Center/index.php" class="btn invite btn-outline-light btn-lg button2 text-uppercase fw-bold" > Jouer en tant qu'invité !</a> -->

                    <!--    <form action="oui.php" method="post" onsubmit="return checkInputsInscription()">
                    <input type="email" id="testmail">
                    <input type="submit">
                  </form>  -->

                  <br>
                  
                  <?php if(isset($_GET['message']) && !(empty($_GET['message']))){
                    echo " <div class='alert alert-$_GET[type] text-center'>
                    <strong> ERREUR ! </strong> $_GET[message] </div>";
               }
                   ?>
   

                </div>
            </div>

            <!-- Colonne 3 -->
            <div class="col-md-3 col-sm-auto col-xs-1 container">



            </div>
    </div>


    </main>
    </div>

    <!-- Modal pour inscription -->

    <div class="modal fade" id="moda2">
        <div class="validation modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Tete du modal -->
                <div class="modal-header">
                    <h4 class="modal-title"> Inscription </h4>
                </div>

                <!-- Corp du modal -->

                <div class="modal-body row">


                    <div class="modif col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">



                        <form class="col" method="post" action="Index/inscription.php" enctype="multipart/form-data" onsubmit="return verifCaptcha()">
                            <div class="form-group">
                                <!-- Form group - Aligner de éléments en vertical -->

                                <label for="email" class="form-control-label"> Email </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Votre email" autocomplete="off" value="" required>

                                <br>

                                <label for="pseudo" class="form-control-label"> Pseudo </label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo"
                                    placeholder="Votre pseudo">

                                <br>

                                <label for="password" class="form-control-label"> Mot de passe </label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Votre mot de passe" autocomplete="off" value="" required>

                                <br>

                                <label for="check" class="form-control-label"> Confirmez votre mot de passe </label>
                                <input type="password" class="form-control" name="check" id="check"
                                    placeholder="Vérifiez votre de mot de passe" required>


                            </div>

                    </div>
                    <div class="col-1">
                    </div>
                    <div id="capcha" class="col-xxl-6 col-5 col-xl-6 col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="box_inside row">
                            <div class="col-sm-12 col-md-12">
                                <div id="products">

                                    <div class="row">
                                        <div class="col-3">

                                            <div class="booga">

                                                <img id="rectangle" class="check" onclick="check1()" src=""
                                                    width="70px">

                                            </div>

                                            <div class="booga">

                                                <img id="rectangle1" class="check" onclick="check2()" src=""
                                                    width="70px">

                                            </div>

                                            <div class="booga">

                                                <img id="rectangle2" class="check" onclick="check3()" src=""
                                                    width="70px">

                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="booga">

                                                <img id="rectangle3" class="check" onclick="check4()" src=""
                                                    width="70px">

                                            </div>
                                            <div class="booga">

                                                <img id="rectangle4" class="check" onclick="check5()" src=""
                                                    width="70px">

                                            </div>
                                            <div class="booga">

                                                <img id="rectangle5" class="check" onclick="check6()" src=""
                                                    width="70px">

                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="booga">

                                                <img id="rectangle6" class="check" onclick="check7()" src=""
                                                    width="70px">

                                            </div>
                                            <div class="booga">

                                                <img id="rectangle7" class="check" onclick="check8()" src=""
                                                    width="70px">

                                            </div>
                                            <div class="booga">

                                                <img id="rectangle8" class="check" onclick="check9()" src=""
                                                    width="70px">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div  class="d-grid gap-2 invisible validation2 exel row">

                            <button id="vogue" type="button" class="btn btn-outline-success">
                                Capcha Validé !
                            </button>
                        </div>


                        <div class="d-grid gap-2 visible parent_verif">
                            <button type="button" class="btn verif btn-outline-danger" onclick="verif()">
                                Vérification du capcha
                            </button>
                        </div>






                    </div>


                    <br>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-dark btn-lg inscription" data-mdb-ripple-color="dark">
                            S'INSCRIRE
                        </button>

                    </div>
                    </form>
                </div>



            </div>

        </div>
    </div>

    <!-- Modal pour connexion -->

    <div class="modal fade" id="moda1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Tete du modal -->
                <div class="modal-header">
                    <h4 class="modal-title"> Connexion </h4>
                </div>

                <!-- Corp du modal -->

                <div class="modal-body">
                    <form class="col" action="Index/connexion.php" method="post" enctype="multipart/form-data">


                        <label for="email" class="form-control-label"> Email </label>
                        <input type="email" class="form-control" name="email" id="emailConnexion"
                            placeholder="Votre email">

                        <br>

                        <label for="password" class="form-control-label"> Mot de passe </label>
                        <input type="password" class="form-control" name="password" id="passwordConnexion"
                            placeholder="Votre mot de passe">
                            <br>
                          <a class="text-dark" href="Index/forgotpassword.php">Mot de passe oublié ?</a>
                        <br>
                        <br>

                        <div class="d-grid gap-2">
                            <input type="submit" class="btn-dark btn-lg" value="Se connecter">
                        </div>

                </div>

                </form>

            </div>

        </div>
    </div>

    <footer class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-12 text-center pied text-white"> Joue au célèbre Blindtest musical avec tes amis
                ! </div>
            <div class="col-md-2"></div>
        </div>
    </footer>

</body>

</html>
