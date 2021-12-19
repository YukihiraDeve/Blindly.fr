<?php 

include('db.php');

$req = "%" . $_GET['recherche'] . "%";
$result = $db ->  prepare('SELECT * FROM users WHERE pseudo LIKE ? ORDER BY pseudo  ');
$result->execute(array($req));
if($result->rowCount() >= 1){

}else{
    echo "Aucun résultat trouvé";
}


?>