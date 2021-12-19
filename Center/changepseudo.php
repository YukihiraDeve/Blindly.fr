<?php

include('../includes/check.php');

$pseudo = $_POST['pseudo'];

$password = hash('md5', $_POST['password']);

if (!isset($pseudo) || !isset($password) || empty($pseudo) || empty($password)) {
  header('location : pseudo.php?message=Vous devez remplir tous les champs');
  exit;
}

include('../db.php');

$q = 'SELECT pseudo, password FROM users WHERE email = :email';
$req = $db->prepare($q);
$req->execute([
	 'email' => $_SESSION['email']
]);

$resultat = $req->fetch();

if ($resultat['password'] != $password) {
  header('location : pseudo.php?message=Mot de passe erroné');
  exit;
}

$q = 'UPDATE users SET pseudo = :pseudo WHERE email = :email';
$req = $db->prepare($q);
$resultat = $req->execute([
  'email' => $_SESSION['email'],
  'pseudo' => $pseudo
]);

if ($resultat) {
  header('location: index.php?Changement de pseudo effectué avec succès');
  exit;
} else {
  header('location: pseudo.php?Changement de pseudo echoué');
  exit;
}
