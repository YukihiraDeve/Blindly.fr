<?php
include('../../db.php');

include('admincheck.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>Blindly</title>
   <link rel="icon" href="../../favicon.png" />
 </head>
 <body>
	 <?php
   if (isset($_GET['message'])) {
     echo "<h2>$_GET[message]</h2>";
   }

	 if(isset($_FILES['audio']) && !empty($_FILES['audio']['name'])){

     	$filename = $_FILES['audio']['name'];
      $type = $_POST['type'];
      $artisttitle = explode('.', $filename);
      $array = explode('-', $artisttitle[0]);
      $artist = $array[0];
      $title = $array[1];
      //echo "$artist<br>$title<br>$type<br>";
      //include('algo.php');


	 	  // Vérifier le type de fichier

	   //var_dump($_FILES['audio']);

     $acceptable = [
    		'audio/mpeg',
    		'audio/mp3'
    	];

    if(!in_array($_FILES['audio']['type'], $acceptable)){
		// Redirection avec un message d'erreur
		header('location:addmusique.php?message=Format de fichier incorrect');
		exit;
	  }
	 	// Vérifier la taille du fichier

	 	$maxSize = 500 * 1024; // Equivaut à 500Ko

    if($_FILES['audio']['size'] > $maxSize){
      header('location:addmusique.php?message=Fichier trop volumineux');
  		exit;
    }

	 	// Chemin vers le dossier d'uploads
	 	$path = "../../Musiques/$type";

	 	//Récuperer l'extension
	 	$array = explode('.', $filename);

	 	$ext = end($array);

		if ($ext != 'mp3') {
			header('location: addmusique.php?message=Format de fichier incorrect');
			exit;
		}

    include('algo.php');

    $filename = "$key" . ".$ext";

    $q = "INSERT INTO $type (musique, nom, categorie, cleCryptage) VALUES (UPPER(:musique), UPPER(:nom), UPPER(:categorie), :cleCryptage)";
    $req = $db->prepare($q);
    $reponse = $req->execute([
    	'musique' => $title,
      'nom' => $artist,
      'categorie' => $type,
      'cleCryptage' => $key
    ]);

    if (!$reponse) {
      header('location: addmusique.php?message=Erreur lors de l\'insertion en base de donnée');
      exit;
    }

	 	$destination = $path . '/' . $filename;
	 	$move = move_uploaded_file($_FILES['audio']['tmp_name'], $destination);

    if ($move) {
      header('location: addmusique.php?message=Insertion réussie');
      exit;
    } else {
      header('location: addmusique.php?message=Oups ! Echec d\'insertion');
      exit;
    }

	 }

	 ?>
    <h3>Merci de renommer le fichier sous le format ('Nom de l'artiste - Titre')</h3>
    <br>
    <h3>Types de musique : POP / ROCK / DESSIN ANIME</h3>
   <form method="post" enctype="multipart/form-data">
     <select name="type">
       <option value="POP">POP</option>
       <option value="ROCK">ROCK</option>
       <option value="RAP">RAP</option>
     </select>
     <input type="file" name="audio">
     <input type="submit" accept=".mp3">
   </form>
 </body>
</html>
