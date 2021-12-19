<?php
include('../../db.php');
include('admincheck.php');


$q = 'UPDATE users SET admin = 1 WHERE pseudo = :pseudo';
$req = $db->prepare($q);
$reponse = $req->execute([
  'pseudo' => $_POST['pseudo']
]);

if ($reponse) {
  header('location: promoteuser.php?message=Utilisateur promu');
  exit;
} else {
  header('location: promoteuser.php?message=Erreur lors de la promotion du compte');
  exit;
}
/*
if (isset($reponse)) {
  if ($reponse) {
    header('location: promoteuser.php?message=Utilisateur promu');
    exit;
  } else {
    header('location: promoteuser.php?message=Erreur lors de la promotion du compte');
    exit;
  }
}

?>
