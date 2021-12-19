<?php

session_start();

$q = "SELECT id FROM users WHERE email = :email AND admin = 1";
$req = $db->prepare($q);
$admin = $req->execute([
  'email' => $_SESSION['email']
]);
$admin = $req->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
  header('location: ../../Error/Error404.html');
  exit;
}

 ?>
