<?php

session_start();

include('../db.php');

$q = 'UPDATE users SET validate = 1 WHERE email = :email';
$req = $db->prepare($q);
$reponse = $req->execute([
	'email' => $_SESSION['email']
]);

if (!$reponse) {
	echo "Validation du compte échouée";
	exit;
}

header('location: ../Center/index.php');
exit;
//Validation du compte dans la base de donnée
/*
$q = 'UPDATE users SET validate = 1 WHERE email = :email';
$req = $db->prepare($q);
$reponse = $req->execute([
	'email' => $_SESSION['email']
]);

if ($reponse) {
  echo "compte verifié";
} else {
  echo "Valdidation du compte échouée";
}
