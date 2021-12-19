<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=projetannuel', 'groupeprojet', 'mathadibval2021', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());    // Si erreur, afficher le message d'erreur
}

?>
