<?php
include('../../db.php');

include('admincheck.php');

$q = 'DELETE FROM users WHERE pseudo = :pseudo';
$req = $db->prepare($q);
$reponse = $req->execute([
  'pseudo' => $_POST['pseudo']
]);

if (isset($reponse)) {
  if ($reponse) {
    header('location: deleteuser.php?message=Utilisateur supprimé');
    exit;
  } else {
    header('location: deleteuser.php?message=Erreur lors de la suppression du compte');
    exit;
  }
}

?>
