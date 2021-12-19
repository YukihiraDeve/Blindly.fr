


<?php

include ('db.php');

session_start();

$roomname = $_SESSION['ROOM'];


$NoMusique = 0;

$start = $_GET["q"];
echo '<p>' . $start . '</p>';

var_dump($start);

if($start == "DESSIN_ANIME"){
    $NoMusique++;
}


$request = "SELECT * FROM $roomname";

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
        'musique' => $value[2],
        'nom' => $value[3],
        'categorie' => $value[4],
        'cleCryptage' => $value[5]
    ];
    }

    var_dump($tab_tempo);


$tab_json["tableau1"] = $tab_tempo;

$encode_donnees = json_encode($tab_json);
file_put_contents("stock.json", $encode_donnees, JSON_FORCE_OBJECT);

}else{
    foreach($data as $key => $value){
        $tab_tempo[$key] = [
            'nom' => $value[2],
            'categorie' => $value[3],
            'cleCryptage' => $value[4]
        ];
        }
    
        var_dump($tab_tempo);
    
    
    $tab_json["tableau1"] = $tab_tempo;
    
    $encode_donnees = json_encode($tab_json);
    file_put_contents("stock.json", $encode_donnees, JSON_FORCE_OBJECT);
}

?>

<script src="game.js"></script>