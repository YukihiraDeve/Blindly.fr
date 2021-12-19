<?php

session_start();

if (isset($_POST['drop']) && !empty($_POST['drop'])) {
  include('../db.php');
  $room = $_SESSION['room'];
  $players = $room . 'PLAYERS';

  $query = "DROP TABLE $room , $players";
  $request = $db->prepare($query);
  $response = $request->execute();

  if ($response) {
    echo "ca marche";
  } else {
    echo "ca marche pas";
  }
}

 ?>
