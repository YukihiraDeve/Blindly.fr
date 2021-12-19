<?php
include('../../db.php');
include('admincheck.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blindly</title>
    <link rel="icon" href="../../favicon.png" />
    <style media="screen">
      #map{
        height:400px;
        width:100%;
      }
    </style>
  </head>
  <body>
    <div id="map">

    </div>

    <?php

    if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
      include('../../db.php');

      $q = 'SELECT latitude, longitude FROM users WHERE pseudo = :pseudo';
      $req = $db->prepare($q);
      $req->execute([
      	 'pseudo' => $_POST['pseudo']
      ]);
      $resultat = $req->fetch();

      if ($resultat) {
        echo "<p>latitude : <p>";
        echo "<p id='latitude'>$resultat[latitude]</p>";
        echo "<p>longitude : <p>";
        echo "<p id='longitude'>$resultat[longitude]</p><br>";
      } else {
        echo "Aucun utilisateur trouvé";
      }
    }

    ?>

    <form method="post">
      <input type="text" name="pseudo" placeholder="pseudo à localiser">
      <input type="submit">
    </form>

    <script type="text/javascript">

      function initMap(){
        // Map options
        var options = {
          zoom:10,
          center:{lat:48.860439,lng:2.341670}
        }
        // Load map
        var map = new google.maps.Map(document.getElementById('map'), options);
        // Add cursor
        var latitude = document.getElementById('latitude');
        var longitude = document.getElementById('longitude');
        a = parseFloat(latitude.innerHTML);
        b = parseFloat(longitude.innerHTML);
        //console.log("Fonction 2 :");
        //console.log("latitude : " + a);
        var marker = new google.maps.Marker({
          position:{lat:a,lng:b},
          map:map
        })
      }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1cqXTkgxGTngJpaxZ14pZvn-8zSwsVQA&callback=initMap"></script>
  </body>
</html>
