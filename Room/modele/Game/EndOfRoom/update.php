<?php
session_start();

echo $_SESSION['email'];

if (isset($_POST['points']) && !empty($_POST['points'])) {
  $points = $_POST['points'];

  $array = explode('"', $points);

  $points = $array[1];

  $room = $_SESSION['room'] . 'PLAYERS';

  include('../db.php');

  $a = 'SELECT pseudo FROM users WHERE email = :email';
  $r = $db->prepare($a);
  $r->execute([
    'email' => $_SESSION['email']
  ]);
  $ps = $r->fetch();

  $_SESSION['pseudo'] = $ps['pseudo'];

  $game = 1;

  $q = 'UPDATE users SET total_score = total_score + :points , game_played = game_played + :game WHERE email = :email';
  $req = $db->prepare($q);
  $reponse = $req->execute([
    'points' => $points,
    'game' => $game,
    'email' => $_SESSION['email']
  ]);

  $query = "UPDATE $room SET points = :points WHERE pseudo = :pseudo";
  $request = $db->prepare($query);
  $res = $request->execute([
    'points' => $points,
    'pseudo' => $_SESSION['pseudo']
  ]);

/*
  $q = 'SELECT game_played FROM users WHERE email = :email';
  $req = $db->prepare($q);
  $req->execute([
  	 'email' => $_SESSION['email']
  ]);

  $resultat = $req->fetch();

  echo $resultat['game_played'];

  $increment = $resultat['game_played'] + 1;

  echo $increment;

  $query = "UPDATE users SET game_played = $increment WHERE email = :email";
  $request = $db->prepare($q);
  $response = $req->execute([
    'email' => $_SESSION['email']
  ]);
*/
  if ($reponse && $res) {
    echo "<br> it works";
    echo "$_SESSION[room]";
  } else {
    echo "<br>no";
  }
}

?>
