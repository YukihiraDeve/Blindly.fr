<?php

function generate(){
  $rand = rand(0, 50000);
  $rand = strval($rand);
  return $rand;
}

function searchROCK(){
  include('db.php');
  $q = 'SELECT cleCryptage FROM ROCK';
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetchAll();
  return $resultat;
}

function searchPOP(){
  include('db.php');
  $q = 'SELECT cleCryptage FROM POP';
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetchAll();
  return $resultat;
}

function searchRAP(){
  include('db.php');
  $q = 'SELECT cleCryptage FROM RAP';
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetchAll();
  return $resultat;
}

function searchDA(){
  include('db.php');
  $q = 'SELECT cleCryptage FROM DESSIN_ANIME';
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetchAll();
  return $resultat;
}



 ?>
