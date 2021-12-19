<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Classement</title>
  </head>
  <body>
    <script type="text/javascript">
        function dropTable(){

          let drop = 1;
          const req = new XMLHttpRequest();
          req.onreadystatechange = function () {
            if (req.readyState == 4) {

            }
          };
          req.open("POST", "drop.php");
          req.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
          // Le format d'envoie est le suivant: K1=v1&K2=v2&K3=v3....
          req.send(`drop=${drop}`);

        }
    </script>
    <?php



       include('../db.php');
       $room = $_SESSION['room'];
       $players = $room . 'PLAYERS';

       $q = "SHOW TABLES FROM projetannuel";
       $req = $db->prepare($q);
       $req->execute();
       // On range tous ces noms dans le tableau $resultat
       $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
       // On recupere le nombre de valeurs dans $resultat
       $count = count($resultat);
       //var_dump($resultat);
       function inaroom($room, $count, $resultat){
           for ($i=0; $i < $count; $i++) {
             if (in_array($room, $resultat[$i])) {
               return true;
             }
          }
            return false;
       }

       $isin = inaroom($room, $count, $resultat);

       if ($isin) {
         // id max
         $max = "SELECT MAX(id) FROM $players";
         $req = $db->prepare($max);
         $req->execute();
         $res = $req->fetch();
         $mid = $res[0];

         $query = "SELECT pseudo, points FROM $players ORDER BY points DESC";
         $request = $db->prepare($query);
         $request->execute();
         $response = $request->fetchAll();
         $dir = "/Room/lobby/$room/";

         shell_exec('rm -r '.$dir);

         //var_dump($response);
         if ($response) {
           echo "<table border='2'>";
           echo "<tr><td>Rang</td><td>Pseudo</td><td>Points</td></tr>";
           for ($i=0; $i < $mid; $i++) {
            $y = $i + 1;
             echo "<tr>";
             echo "<td>$y</td>";
             echo '<td>' . $response[$i]['pseudo'] .'</td>';
             echo '<td>' . $response[$i]['points'] . '</td>';
             echo "</tr>";
           }
           echo "</table><br>";
           echo 'Le meilleur joueur est :' . $response[0]['pseudo'] . '<br>';

           $top = 1;
           $q = "UPDATE users SET top = top + :top WHERE pseudo = :pseudo";
           $req = $db->prepare($q);
           $reponse = $req->execute([
             'top' => $top,
             'pseudo' => $response[0]['pseudo']
           ]);

         }
       }


     ?>
     <button type="button" onclick="dropTable()">Drop Table</button>
  </body>
</html>
