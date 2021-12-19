<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlindLy</title>
    <link rel="stylesheet" href="style_classement.css">
    <link rel="text/css" href="/css/bootstrap.min.cs">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

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
                    <a class="nav-link navbar-brand " href="/Center/index.php">
                        <h2 class="slogan nav-item blindly"> BlindLy </h2>
                    </a>

                </li>
            </ul>

            <ul class="nav justify-content-end">
                <li class="nav-item justify-content-end d-flex">
                    <img id="icon" type="button" class="son" src="/Images/logo sound 1.png" onclick="playVid()"
                        width="30px">
                </li>
            </ul>

        </nav>

        <div class="row pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <h5 class="text-white h4"> Paramètres de la page </h5>
                    <span class="text-muted"> Toute données ne sera pas sauvegarder </span>
                </div>
            </div>

        </div>

    </div>

    <audio id="MySong" src="/songs/Land – MusicbyAden (No Copyright Music).mp3" type="audio/mp3" autoplay loop>
    </audio>


</header>

<body class="bg-dark">

    <main>

        <div class="row">
            <div class="col-1">

            </div>

            <div class="col-2 boxy">
                <h1 class="text-white text-center"> Liste de joueur </h1>

                <table cellpadding="0" cellspacing="0" border="0"
                    class="table table-striped table-hover table-condensed" id="results-table">
                    <thead>
                        <th> Pseudo <span style="margin-left: 5px;" class="glyphicon glyphicon-dynamic"></span></th>
                    </thead>



                    <?php include('db.php');



                        $q = 'SELECT * FROM users WHERE id >= all (SELECT id FROM users ORDER BY id DESC)';
                        $req = $db->prepare($q);
                        $req->execute();
                        $response = $req->fetch();

                        $maxid = $response['id'];

                        $y = 1;
                        for ($i = 1; $i <= $maxid ; $i++) {
                        $q = "SELECT * FROM users WHERE id = $i AND validate = 1";
                        $req = $db->prepare($q);
                        $req->execute();
                        $users = $req->fetch();


                                if($users){
                        ?>

                    <tr>
                        <td><?php echo $users['pseudo'] ?></td>
                    </tr>



                    <?php $y += 1; }

                    }


                    ?>

                </table>


            </div>




            <div class="col-1">

            </div>
            <div class="col-6 boxy">
                <h1 class="text-white text-center"> Rechercher un joueur </h1>

                <?php

                include('db.php');


                $q5 = 'SELECT pseudo,game_played,total_score,image FROM users WHERE validate = 1';
                $req5 = $db -> prepare($q5);
                $req5 -> execute();
                while($response5 = $req5 -> fetch()){
                    $data5[]=$response5;
                };

                foreach($data5 as $key => $value){
                    $tab[$key] = [
                        'pseudo' => $value[0],
                        'game_played' => $value[1],
                        'total_score' => $value[2],
                        'image' => $value[3]
                    ];
                }

                $js = json_encode($tab);
                file_put_contents("stock.json", $js);

                ?>


                 <div class="wrapper">
                    <div class="form-outline search-input">
                        <input id="search" name="pseudo" type="search" id="form1" class="form-control sear" placeholder="Entrez le pseudo du joueur"
                            aria-label="Search" autocomplete="off" />

                    </div>
                    <div id="match-list" class="suggestions text-white">

                        </div>
                 </div>



                <!-- //   <------>

                <br>

                <div id="profil" class="card-body bg-dark invisible">


                    <div class="row">

                        <div  class="boxy-profil row ">

                            <div class="col-3">

                                <img id="imagen" src="/css/Gobou-ROSA.png" width="100px">


                            </div>

                            <div class="col-1">

                            </div>

                            <div class="col-8">

                            <p id="name" class="text-white"> Pseudo : </p>
                            <br>
                            <p id="game_p" class="text-white"> Pseudo : </p>
                            <br>
                            <p id="points" class="text-white"> Pseudo : </p>


                            </div>

                        </div>
                    </div>


                </div>





            </div>

    </main>

</body>

<script src="ajax.js"> </script>

</html>
