


<?php

include ('db.php');

$NoMusique = 0;

$start = $_GET["q"];
echo '<p>' . $start . '</p>';

var_dump($start);

if($start == "1"){

    
    $search = "ROCK";
    
}


if($start == "2"){

    $search = "RAP";

}

if($start == "3"){

        $search = "POP";
}

if($start == "4"){
    
    $search = "DESSIN_ANIME";
    $NoMusique++;
}


var_dump($search);

$request = "SELECT * FROM $search";

$req = $db -> prepare($request);
$req -> execute();

while($row = $req -> fetch()){
    $data[]=$row;
}

var_dump($data);

$file = "stock.json";
$tab_tempo=[];
    

if($NoMusique == 0){
foreach($data as $key => $value){
    $tab_tempo[$key] = [
        'musique' => $value[1],
        'nom' => $value[2],
        'categorie' => $value[3],
        'cleCryptage' => $value[4]
    ];
    }

    var_dump($tab_tempo);


$tab_json["tableau1"] = $tab_tempo;

$encode_donnees = json_encode($tab_json);
file_put_contents("stock.json", $encode_donnees, JSON_FORCE_OBJECT);

}else{
    foreach($data as $key => $value){
        $tab_tempo[$key] = [
            'nom' => $value[1],
            'categorie' => $value[2],
            'cleCryptage' => $value[3]
        ];
        }
    
        var_dump($tab_tempo);
    
    
    $tab_json["tableau1"] = $tab_tempo;
    
    $encode_donnees = json_encode($tab_json);
    file_put_contents("stock.json", $encode_donnees, JSON_FORCE_OBJECT);
}
//  $count = count ($row);
//  echo($count);

//  $search = rand(1,$count);

//  // Ce code nous renvoie un match entre $search et la nième colonne retrouvée PAS BON
//  echo( "<p id='dom'>" . $search . "</p>" . "<br>");
// //  echo($row[$search-1]['musique'] . "<br>");

//  // Ce code nous renvoie un match entre $search et la colonne où 'id' est égal à search
//  $i = 0;
//  for($i=0; $i < $count ;$i++){
//      if ($search == $row[$i]['id']) {
//         // echo($row[$i]['musique']);
//      }
//  }



// $file = "package.json";
// $tab_tempo = [];

//     $tableau_pour_json["shema_1"] = $tab_tempo;

//     $contenu_json = json_encode($tableau_pour_json);

//     file_put_contents($file, $contenu_json, JSON_FORCE_OBJECT);
// }
// catch( Exeption $e ){
//     echo "Erreur : ".$e -> getMessage();
// }
?>

<script src="game.js"></script>