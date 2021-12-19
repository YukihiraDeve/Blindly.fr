<?php

session_start();

// Enregistrement et verification d'un fichier image
if (isset($_FILES['pic']) && !empty($_FILES['pic']['name'])) {

  // Verification du type de fichier
  $acceptable = [
		'image/jpeg',
		'image/png',
		'image/gif'
	];

  if(!in_array($_FILES['pic']['type'], $acceptable)){
		// Redirection vers la page d'inscription avec un message d'erreur
		header('location:index.php?message=Format de fichier incorrect.');
		exit; // Arrêt du code
	}

  // Vérifier la taille du fichier
	$maxSize = 2 * 1024 * 1024;

  if($_FILES['pic']['size'] > $maxSize){
		// Redirection vers la page d'inscription avec un message d'erreur
		header('location: index.php?message=Le fichier est trop volumineux');
		exit; // Arrêt du code
	}

  // Chemin vers le dossier d'uploads
  $path = '../uploads';

  $filename = $_FILES['pic']['name'];

  // Enregistrement du fichier
	$filename = $_FILES['pic']['name'];

	//Renommer l'image (ex : image-6183628.ext)
	//Récuperer l'extension
	$array = explode('.', $filename);

	$ext = end($array);
  // On renomme le fichier
	$filename = 'image-' . time() . '.' . $ext;

  $destination = $path . '/' . $filename;

	$move = move_uploaded_file($_FILES['pic']['tmp_name'], $destination);

  if (!$move) {
    header('location: index.php?message=Erreur lors de l\'upload du fichier');
    exit;
  }

  include('../db.php');

  $q = 'UPDATE users SET image = :image WHERE email = :email';
  $req = $db->prepare($q);
  $reponse = $req->execute([
    'image' => $filename,
    'email' => $_SESSION['email']
  ]);

  if ($reponse) {
    header('location: index.php?message=Changement de photo réussi');
    exit;
  } else {
    header('location: index.php?message=Erreur lors de l\'upload du fichier');
    exit;
  }

}

header('location: index.php');
exit; 


?>
