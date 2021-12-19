<?php

include('../../functions.php');
include('../../db.php');
include('admincheck.php');

$rand = generate();

if ($type == 'ROCK') {
  $resultat = searchROCK();
}

if ($type == 'RAP') {
  $resultat = searchRAP();
}

if ($type == 'POP') {
  $resultat = searchPOP();
}

$count = count($resultat);

$array = array();

for ($i=0; $i < $count; $i++) {
  $array[$i] = $resultat[$i][0];
}

while (in_array($rand, $array)) {
  $rand = generate();
}

$key = $rand;


 ?>
