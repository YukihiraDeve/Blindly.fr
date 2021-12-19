<?php
     $id = rand(1 , 4);
?>

<!DOCTYPE html>
<html>
<a id="port"><?php echo $id ?></a>
</html>

<script>
  const port = document.getElementById('$id').innerHTML
  localStorage.port = port
</script>

<?php

session_start();

//Tu insere ici

if (isset($_POST['round']) && isset($_POST['type']) && !empty($_POST['round']) && !empty($_POST['type']) && isset($_POST['roomname']) && !empty($_POST['roomname'])) {

  // Mettre les paramètres POST dans des variables
  // type = ROCK / POP / RAP
  $type = $_POST['type'];
  $rounds = $_POST['round'];
  $roomname = $_POST['roomname'];
  $pseudo = $_SESSION['pseudo'];
  $players = $roomname . 'PLAYERS';

  // Connexion à la base
  include('../db.php');

  // On selectionne tous les noms de table dans la base

  $q = "SHOW TABLES FROM projetannuel";
  $req = $db->prepare($q);
  $req->execute();
  // On range tous ces noms dans le tableau $resultat
  $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
  // On recupere le nombre de valeurs dans $resultat
  $count = count($resultat);

  for ($i=0; $i < $count; $i++) {
    if (in_array($roomname, $resultat[$i])) {
      header('location: index.php?message=Ce nom de room n\'est pas disponible');
      exit;
    }
  }


  //On selectionne l'id max dans la table du type de musique choisi
  $q = "SELECT MAX(id) FROM $type";
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetch();

  // On obtient l'id max
  $maxid = $resultat['MAX(id)'];
  //echo "<br>id max = $maxid<br>";

  // On creer un tableau avec l'id des musiques que l'on va selectionner par la suite
  $var = array();

  // On défini la première valeur
  $var[0] = rand(1, $maxid);
  // On range les id dans le tableau
  for ($i=1; $i < $rounds; $i++){
    $temp = rand(1, $maxid);
    // Si $temp est déjà dans le tableau, on regénère un nombre
    while(in_array($temp, $var)){
      $temp = rand(1, $maxid);
    }
    // Si il n'est pas déjà dans le tableau, on l'ajoute
    $var[$i] = $temp;
  }

  // On creer un tableau à double dimension où l'on va inserer toutes les données des musiques
  // qui ont les id correspondant aux valeurs du tableau $var
  $music = array(array());

  // On fait une boucle pour selectionner nom, artiste etc.. de toutes ces musiques
  for ($i=0; $i < $rounds; $i++) {
    $query = "SELECT * FROM $type WHERE id = $var[$i]";
    $request = $db->prepare($query);
    $request->execute();
    $result = $request->fetch();
    // On récupère toutes les données de chaque musique et on les range dans le tableau $music
    // Exemple : le nom de la première musique dans $music sera noté => $music[0]['nom']
    $music[$i]['id'] = $result[0];
    $music[$i]['musique'] = $result[1];
    $music[$i]['nom'] = $result[2];
    $music[$i]['categorie'] = $result[3];
    $music[$i]['cleCryptage'] = $result[4];
    //var_dump($music[$i]);
    //echo "<br>";
  }



  // Creation de la table avec comme nom $roomname
  $sql = "CREATE TABLE $roomname (
    order_select INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id VARCHAR(4),
    musique VARCHAR(100),
    nom VARCHAR(100),
    categorie VARCHAR(100),
    cleCryptage VARCHAR(5)
  )";
  $query = $db->prepare($sql);
  $create = $query->execute();

  // Si la table s'est créée ...
  if ($create) {

    for ($i=0; $i < $rounds; $i++){
      $q = "INSERT INTO $roomname (id, musique, nom, categorie, cleCryptage) VALUES (:id, :musique, :nom, :categorie, :cleCryptage)";
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id' => $music[$i]['id'],
        'musique' => $music[$i]['musique'],
        'nom' => $music[$i]['nom'],
        'categorie' => $music[$i]['categorie'],
        'cleCryptage' => $music[$i]['cleCryptage']
      ]);

      if ($reponse) {
        echo "insertion réussie<br>";
      } else {
        echo "insertion échouée<br>";
      }
    }

    $sql = "CREATE TABLE $players (
      id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
      pseudo VARCHAR(100),
      points INTEGER DEFAULT 0
    )";
    $query = $db->prepare($sql);
    $create2 = $query->execute();

    if ($create2) {
      $q = "INSERT INTO $players (pseudo) VALUES (:pseudo)";
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'pseudo' => $_SESSION['pseudo']
      ]);

      if ($reponse) {
        echo "insertion joueur dans TABLE PLAYERS";
      } else {
        echo "ECHEC INSERTION PLAYERS";
      }
    } else {
      echo "<br>echec creation table PLAYERS";
    }

  } else {
    echo "<br>echec creation table ROOM";
  }



    mkdir("../Room/lobby/$roomname");
    $dir = opendir("../Room/modele");
    $src =("../Room/modele");
    $dist = ("../Room/lobby/$roomname");
    while(false !==( $file = readdir($dir))){
        if (($file !='.') && ($file !='..')){
            if(is_dir($src.'/'.$file)){
                echo "true";
            }
            else{
                copy($src.'/'.$file,$dist.'/'.$file);
            }
        }


        }
        closedir($dir);



        mkdir("../Room/lobby/$roomname/Game");
        $dirG = opendir("../Room/modele/Game");
        $srcG =("../Room/modele/Game");
        $distG = ("../Room/lobby/$roomname/Game");
        while(false !==( $fileG = readdir($dirG))){
            if (($fileG !='.') && ($fileG !='..')){
                if(is_dir($srcG.'/'.$fileG)){
                    echo "true";
                }
                else{
                    copy($srcG.'/'.$fileG,$distG.'/'.$fileG);
                }
            }
            }
            closedir($dirG);


        mkdir("../Room/lobby/$roomname/node_modules");
        $dirN = opendir("../Room/modele/node_modules");
        $srcN =("../Room/modele/node_modules");
        $distN = ("../Room/lobby/$roomname/node_modules");
        while(false !==( $fileN = readdir($dirN))){
            if (($fileN !='.') && ($fileN !='..')){
                if(is_dir($srcN.'/'.$fileN)){
                    echo "true";
                }
                else{
                    copy($srcN.'/'.$fileN,$distN.'/'.$fileN);
                }
            }
            }
        closedir($dirN);

        mkdir("../Room/lobby/$roomname/node_modules/ws/");
        $dirWS = opendir("../Room/modele/node_modules/ws/");
        $srcWS =("../Room/modele/node_modules/ws/");
        $distWS = ("../Room/lobby/$roomname/node_modules/ws/");
        while(false !==( $fileWS = readdir($dirWS))){
            if (($fileWS !='.') && ($fileWS !='..')){
                if(is_dir($srcWS.'/'.$fileWS)){
                    echo "true";
                }
                else{
                    copy($srcWS.'/'.$fileWS,$distWS.'/'.$fileWS);
                }
            }
            }
        closedir($dirWS);


        mkdir("../Room/lobby/$roomname/node_modules/ws/lib");
        $dirWSL = opendir("../Room/modele/node_modules/ws/lib");
        $srcWSL =("../Room/modele/node_modules/ws/lib");
        $distWSL = ("../Room/lobby/$roomname/node_modules/ws/lib");
        while(false !==( $fileWSL = readdir($dirWSL))){
            if (($fileWSL !='.') && ($fileWSL !='..')){
                if(is_dir($srcWSL.'/'.$fileWSL)){
                    echo "true";
                }
                else{
                    copy($srcWSL.'/'.$fileWSL,$distWSL.'/'.$fileWSL);
                }
            }
            }
            closedir($dirWSL);

        mkdir("../Room/lobby/$roomname/Game/EndOfRoom");
        $dirEnd = opendir("../Room/modele/Game/EndOfRoom");
        $srcEnd =("../Room/modele/Game/EndOfRoom");
        $distEnd = ("../Room/lobby/$roomname/Game/EndOfRoom");
        while(false !==( $fileEnd = readdir($dirEnd))){
            if (($fileEnd !='.') && ($fileEnd !='..')){
                if(is_dir($srcEnd.'/'.$fileEnd)){
                    echo "true";
                }
                else{
                    copy($srcEnd.'/'.$fileEnd,$distEnd.'/'.$fileEnd);
                }
            }
            }
            closedir($dirEnd);






}

?>

<!DOCTYPE html>
<html>
<a id="port"><?php echo $id ?></a>
</html>
<script>
  const port = document.getElementById('$id').innerHTML
  localStorage.port = port
</script>

<?php
  header("Location: /Room/lobby/$roomname/room.php?message=$roomname&pseudo=$pseudo&ws=$id");
    exit;

?>
