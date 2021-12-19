<?php
session_start();

echo $_SESSION['email'];

if (isset($_POST['points']) && !empty($_POST['points'])) {
  $points = $_POST['points'];

  $array = explode('"', $points);

  $points = $array[1];

  include('../../../db.php');

  $game = 1;

  $q = 'UPDATE users SET total_score = total_score + :points , game_played = game_played + :game WHERE email = :email';
  $req = $db->prepare($q);
  $reponse = $req->execute([
    'points' => $points,
    'game' => $game,
    'email' => $_SESSION['email']
  ]);


  if ($reponse) {
    echo "<br> it works";
  } else {
    echo "<br>no";
  }
}

?>
