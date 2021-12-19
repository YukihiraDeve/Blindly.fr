<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
    td{
      text-align: center;
    }
  </style>
  <body>
    <h1></h1>
    <?php

    include('../../db.php');

    $query = "SELECT pseudo, total_score, game_played FROM users ORDER BY total_score DESC LIMIT 5";
    $request = $db->prepare($query);
    $request->execute();

    $response = $request->fetchAll();

    //var_dump($response[0][0]);
    echo "<table border='2'>";
    echo "<tr><td></td><td>pseudo</td><td>points totaux</td><td>parties jouées</td></tr>";

    for ($i=0; $i <= 4; $i++) {
      $y = $i + 1;
      echo "<tr>";
      echo "<td>$y - </td>";
      echo '<td>' . $response[$i][0] .'</td>';
      echo '<td>' . $response[$i][1] . '</td>';
      echo '<td>' . $response[$i][2] . '</td>';
      echo "</tr>";
    }

    echo "</table>";
    ?>
    <table>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
  </body>
</html>
