<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Game </title>
  <scss> </scss>
  <link rel="stylesheet" href="style_room.css">
  <link rel="text/css" href="/css/bootstrap.min.cs">
  <link rel="stylesheet" href="/css/bootstrap.css">

</head>


<body>
<body class="body bg-dark">

  <div class="text-white">
  <main class="row">
    <div>

      <?php
         include('db.php');
         $roomname = $_GET['message'];
         $_SESSION['ROOM'] = $roomname;
         $Room = "SELECT * FROM $roomname";
         $req = $db -> prepare($Room);
         $req -> execute();
         $tab = $req -> fetchAll();
         $count = count($tab);
         $style = $tab[0]['categorie'];
         $pseudo = $_SESSION['pseudo'];
         ?>
    </div>
    <h1 id="Round"><?php echo $count; ?></h1>
    id Room : <a href="#" class="fw-normal fs-5" id="idRoom"><?php $roomname = $_GET['message'];
    echo $roomname?>
    <a class="fw-normal fs-5"><?php echo $style;?></a>
    <a id="counter"></a>
    <a id="players"><?php 
     echo "$_SESSION[pseudo]"; ?></a>
      <div class="col zone">
        <div class="row chat user">
          <div id="log"></div>
        </div>
        <div id="sendCtrls">*
          <input type="text" placeholder="Entrez un message..." id="text">
          <button id="button_Chat">Envoyer</button>
          <button id="start" >Annonce au client</button>
          <button onclick="changement()">On lance la party</button>          
        </div>
      </div>
<script>
  var loc = window.location,new_uri
  var name = document.getElementById('players').innerHTML
  var join = 1;
  var counterID = document.getElementById('counter')

        /* if (loc.protocol === "https:") {
          new_uri = "wss:"
        } else {
          new_uri = "ws:";
        }
      */
      var ws = null;
  try {
    // Connexion vers un serveur HTTPS
    // prennant en charge le protocole WebSocket over SSL ("wss://").
    ws = new WebSocket("ws://blindly.fr:8000");
} catch (exception) {
    console.error(exception);
}

  // var ws = new WebSocket("wss://blindly.fr:" + port);

  ws.onopen = function () { // Vas envoyer au server le pseudo du joueur
    log.innerHTML += "Vous avez rejoins la party ! <br>";
    ws.send(JSON.stringify({
      type: "name",
      data: name
    }));

  }

  var log = document.getElementById('log');
  var players = document.getElementById('players');

  ws.onmessage = function (event) {
    var json = JSON.parse(event.data); // etablie une variable qui lira l'évenement
    console.log("Start evenement") 
    if (join == 1 ){ // Connexion de l'utilisateur
      console.log("test join")
      players.innerHTML += json.name + "<br>";
      log.innerHTML += json.name + "a rejoins la party <br>";
      log.innerHTML += json.name + ": " + json.data + "<br>";
      join = join + 1 
      return
    }  
    if (json.data){ // Lecture d'un paquet data
      console.log('json.data')
      log.innerHTML += json.name + ": " + json.data + "<br>";
    }
    if (json.counter){ // paquet counter
      console.log('Counter ' + json.counter)
       counterID.innerHTML = json.counter + "/10 joueur"
    }
    if (json.ready){ // Lecture d'un paquet ready
       log.innerHTML += json.name + ": " + json.data + "<br>";
  }
  }

  document.getElementById('button_Chat').onclick = function () { // vas envoyer un paquet de l'utilisateur de ce qu'il a ecrit
      console.log('button')
      var text = document.getElementById('text').value;
      ws.send(JSON.stringify({
        type: "message",
        data: text
      }));
      log.innerHTML += "You: " + text + "<br>";
    };


    document.getElementById('start').onclick = function (){       //Vas envoyer un paquet a tout les utilsateur quand un joueur est pret
      var ready = 1;
      console.log('Button envoie paquet')
      ws.send(JSON.stringify({
        type: "Game",
        ready: ready
      }))
}



</script>






</div>

</body>
<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>