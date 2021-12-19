<?php

//Verifier les parametres envoyés dans post

//$_POST['email']
//$_POST['password']

if (isset($_POST['email']) && !empty($_POST['email'])) {
	//Creer un cookie qui expire dans 1 heure
	setcookie('email', $_POST['email'], time() + 3600);
}

//Si le champ du mdp est vide ou celui du login
if ( !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])){
	// Rediriger vers l'index
	header('location: ../index.php?message=Vous devez remplir tous les champs');
	exit;
}

//Si le format de l'email n'est pas valide
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: ../index.php?message=Email invalide');
	exit;
}

// Connexion à la base de données
include('../db.php');

//Selectionner l'utilisateur avec l'email et le password envoyé dans le formulaire
//MD5 permet de hash le password de l'utilisateur
/*
$q = "SELECT id FROM users WHERE email = :email AND password = :password AND admin = 1";
$req = $db->prepare($q);
$admin = $req->execute([
	'email' => $_POST['email'],
	// Fonction hash permet de crypter le mot de passe dans la BDD
	'password' => hash('MD5', $_POST['password'])
]);
$admin = $req->fetch(PDO::FETCH_ASSOC);

if ($admin) {
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$q = 'INSERT INTO Connexion (email, id, date) VALUES (:email, :id, :date)';
	$req = $db->prepare($q);
	$response = $req->execute([
		'email' => $_SESSION['email'],
		'id' => $admin['id'],
		'date' => date("d/m/Y")
	]);
	header('location: ../admin/index.php');
	exit;
}
*/
$q = "SELECT id FROM users WHERE email = :email AND password = :password AND validate = 1";
$req = $db->prepare($q);
$reponse = $req->execute([
	'email' => $_POST['email'],
	// Fonction hash permet de crypter le mot de passe dans la BDD
	'password' => hash('MD5', $_POST['password'])
]);

$reponse = $req->fetch(PDO::FETCH_ASSOC); //renvoie false si aucune ligne dans la database trouvée

if ($reponse) {
	session_start();
	$_SESSION['email'] = $_POST['email'];
	//$ip = $_SERVER['REMOTE_ADDR'];

	$q = 'INSERT INTO Connexion (email, id, date) VALUES (:email, :id, :date)';
	$req = $db->prepare($q);
	$response = $req->execute([
		'email' => $_SESSION['email'],
		'id' => $reponse['id'],
		'date' => date("d/m/Y H:i:s")
	]);

	header('location: ../Center/index.php');
	exit;
} else {

	$q = "SELECT id FROM users WHERE email = :email AND password = :password AND validate = 0";
	$req = $db->prepare($q);
	$notauth = $req->execute([
		'email' => $_POST['email'],
		// Fonction hash permet de crypter le mot de passe dans la BDD
		'password' => hash('MD5', $_POST['password'])
	]);

	$notauth = $req->fetch(PDO::FETCH_ASSOC);
	if ($notauth) {
		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('location: index_mail.php');
		exit;
	} else {
		header('location: ../index.php?Identifiants incorrects');
		exit;
	}

}
