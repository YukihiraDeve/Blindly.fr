<?php

session_start();

$mail =  $_SESSION['email'];

$key = rand(10000, 99999);

$_SESSION['key'] = $key;

$msg = "Voici votre code de validation : $key";

$header = "From: no-reply@blindly.fr";

$msg = wordwrap($msg,70);

//Envoie de mail

mail($mail,"Verification de compte Blindly.fr",$msg,$header);

?>
