<?php

function generate(){
  $rand = rand(0, 50000);
  $rand = strval($rand);
  return $rand;
}

function searchRock(){
  include('db.php');
  $q = 'SELECT cleCryptage FROM ROCK';
  $req = $db->prepare($q);
  $req->execute();
  $resultat = $req->fetchAll();
  return $resultat;
}
$type = 'ROCK';
$rand = generate();
$rand = '8672';
echo "Clé d'origine : $rand";

$resultat = searchRock();

$count = count($resultat);

echo "<br><br>";

var_dump($resultat);
echo "<br><br>";

$array = array();

for ($i=0; $i < $count; $i++) {
  $array[$i] = $resultat[$i][0];
}

while (in_array($rand, $array)) {
  $rand = generate();
}

echo "Nouvelle key : $rand";

/*
for ($i=0; $i < $count ; $i++) {
  if ($resultat[$i][0] == $rand) {
    echo "g trouvé<br>";
    $rand = generate();
  }
}

echo "La nouvelle clé est $rand";
*/
?>
