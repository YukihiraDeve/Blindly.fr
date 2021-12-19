<?php

include('../includes/check.php');

$password = hash('md5' , $_POST['password']);
$new = hash('md5' , $_POST['new']);
$check = hash('md5' , $_POST['check']);

if ($new != $check) {
  header('location: password.php?message=Les mots de passe ne correspondent pas');
  exit;
}

include('../db.php');

$q = 'SELECT password FROM users WHERE email = :email';
$req = $db->prepare($q);
$req->execute([
	 'email' => $_SESSION['email']
]);

$resultat = $req->fetch();

if ($password != $resultat['password']) {
  header('location: password.php?message=Mot de passe erroné');
  exit;
}

$q = 'UPDATE users SET password = :password WHERE email = :email';
$req = $db->prepare($q);
$resultat = $req->execute([
  'email' => $_SESSION['email'],
  'password' => $new
]);

if ($resultat) {
  header('location: index.php?Changement de mot de passe réussi');
  exit;
} else {
  header('location: password.php?Changement de password echoué');
  exit;
}
 ?>
