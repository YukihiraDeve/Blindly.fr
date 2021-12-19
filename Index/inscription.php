<?php

//Verifier les parametres envoyés dans post

//$_POST['email']
//$_POST['password']


//Si le champ du mdp est vide ou celui du login
if ( !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) ||  empty($_POST['password'])){
    // Rediriger vers connexion.php avec un message dans l'URL
    header('location: ../index.php?message=Vous devez remplir les deux champs.&type=danger');
    exit;
}

//Verifie que les mots de passes ne sont pas différents
if ($_POST['password'] !== $_POST['check']) {
    header('location: ../index.php?message=Les mots de passe ne correspondent pas.&type=danger');
    exit;
}


//Verifie que le format de l'email est bien valide
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //Sinon, redirige vers le formulaire de connexion
    header('location: ../index.php?message=Email invalide');
    exit;
}

//Verifie que le pseudo fait entre 6 et 12 caractères
if (strlen($_POST['pseudo']) < 6 || strlen($_POST['pseudo']) > 12) {
	header('location: ../index.php?message=Votre pseudo doit être compris entre 6 et 12 caractères.&type=danger');
	exit;
}


//Verifie que le captcha est bien valide (JS)
  if (isset($_POST['captcha'])) {
  if ($_POST['captcha'] != $_POST['usercaptcha']) {
    header('location: ../index.php?message=Captcha invalide.&type=danger');
    exit;
  }
}

//Captcha php
/*  if (isset($_POST['captcha'])) {
    if ($_POST['captcha'] != $_POST['usercaptcha']) {
      header('location: ../index.php?message=Captcha invalide');
      exit;
    }
} */


//$pseudo = filter_var($_POST['pseudo'], FILTER_UNSAFE_RAW);

//--------------------------------------------------------------------------------------------------------

// Connexion à la base de données
include('../db.php');

//Verifier que l'email n'est pas déjà utilisé
$q = 'SELECT id FROM users WHERE email = :email';
$req = $db->prepare($q);
$req->execute([
	 'email' => $_POST['email']
]);

$resultat = $req->fetch();

//Si il est dejà utilisé, rediriger vers l'index
if ($resultat) {
	 header('location: ../index.php?message=Cet Email est déjà utilisé.&type=danger');
	  exit;
}

//----------------------------------------------------------------------------------------

//Verifier que le pseudo n'est pas déjà utilisé
$q = "SELECT id FROM users WHERE pseudo = :pseudo";
$req = $db->prepare($q);
$req->execute([
	 'pseudo' => $_POST['pseudo']
]);

$resultat = $req->fetch();

//Si il est dejà utilisé, rediriger vers l'index
if ($resultat) {
	 header('location: ../index.php?message=Ce pseudo est déjà utilisé.&type=danger');
	 exit;
}

//-------------------------------------------------------------------------------------

$date = date("d/m/Y");

//Requiete préparée avec des clés dans le tableau (bonne methode)
$q = "INSERT INTO users (email, pseudo, password, date_inscription) VALUES (:email, :pseudo, :password, :date_inscription)";
$req = $db->prepare($q);
$reponse = $req->execute([
	'email' => $_POST['email'],
  'pseudo' => $_POST['pseudo'],
	// Fonction hash permet de crypter le mot de passe dans la BDD
	'password' => hash('MD5', $_POST['password']),
  'date_inscription' => $date
]);

//Si le script fonctionne, rediriger vers l'Accueil,
if ($reponse){

  	//On ouvre une session avec le mail de l'utilisateur
  	session_start();

  	//Mettre un parametre email avec la valeur envoyée via le post
  	$_SESSION['email'] = $_POST['email'];

    //Envoi du mail pour Verification du compte
    include('sendmail.php');

  	//header('location: validateinscription.php?message=Compte créé avec succes');
    header('location:index_mail.php');
    exit;

}else{
  //Sinon retourner à la page d'inscription
	header('location: ../index.php?message=Erreur lors de la creation du compte.&type=danger');
	exit;
}
