<?php

session_start();

if (isset($_POST['latitude']) && isset($_POST['longitude'])) {

  $email = $_SESSION['email'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  include('../db.php');

  $q = "UPDATE users SET latitude = ? , longitude = ? WHERE email = ?";
  $req = $db->prepare($q);
  $reponse = $req->execute([
    $latitude,
    $longitude,
    $email
  ]);

  if ($reponse) {
    echo "Mise à jour des coordonnées réussie";
  } else {
    echo "Echec lors de la mise à jour des coordonnées";
  }

} else {
  echo "Fatal error";
}

?>
