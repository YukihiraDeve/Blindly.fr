<?php
session_start();

$room = $_POST['roomID'];
$players = $room . 'PLAYERS';

if($room == "01000010 01001111 01001111 01001101 01000101 01010010"){
    header("location: /Center/secret/index.php");
}

include('../db.php');

$q = "SHOW TABLES FROM projetannuel";
$req = $db->prepare($q);
$req->execute();
// On range tous ces noms dans le tableau $resultat
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
// On recupere le nombre de valeurs dans $resultat
$count = count($resultat);

for ($i=0; $i < $count; $i++) {
  if (in_array($room, $resultat[$i])) {

    $q = "SELECT id FROM $players WHERE pseudo = :pseudo";
    $req = $db->prepare($q);
    $req->execute([
    	 'pseudo' => $_SESSION['pseudo']
    ]);

    $resultat = $req->fetch();
    if ($resultat) {
      header('location: index.php?Vous etes déjà dans cette room');
      exit;
    }

    $q = "INSERT INTO $players (pseudo) VALUES (:pseudo)";
    $req = $db->prepare($q);
    $reponse = $req->execute([
      'pseudo' => $_SESSION['pseudo']
    ]);

    if ($reponse) {
      header("Location: /Room/lobby/$room/room.php?message=$room");
      exit;
    }
  }
}

header('location: index.php?Room introuvable');
exit;

/*



if($room == "01000010 01001111 01001111 01001101 01000101 01010010"){
    header("location: /Center/secret/index.php");

}else{

header("Location: /Room/lobby/$room/room.php?message=$room");

}
*/

?>
