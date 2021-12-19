var son = document.getElementById("music");


setTimeout(secu(), 5000);


function secu() {
    const secu_for_game = 10;
    localStorage.secu_for_game = secu_for_game;
}



let tab_pro_AJAX= [];
let rock = [];
let stock = 0;
let tab = [];

fetch('stock.json')
    // transformation en données normal // Promesses, si une commande then passe, l'autre se déroule
    .then(res => res.json())
    .then(data => {

        data.tableau1.forEach(element => {
            tab_pro_AJAX.push(element.categorie + "/" + element.nom + "-" + element.musique + "$" + element.categorie + "/" + element.cleCryptage)

        });

        tab = tab_pro_AJAX;

        Init();
        generator();
 
    })


var interval = null;


// La function generator est lancé à la fin de la requete ajax.

let accumulation = 0;

function generator() {


    var x = 0;

    music = tab[0];

    var div = music.split("$");

    cleCryptage = div[1];

    music = div[0];


    son.src = "/Musiques/" + cleCryptage + ".mp3"
    son.volume = 0.3;

    tab.splice(x, 1);
}


function StopFunction() {
    clearInterval(interval);
    // clearInterval(progresss);
}

// Le coeur du code, se lance tout les 30secondes

function Init() {

    var interval = setInterval("generator()", 30000);
    var restart = setInterval("restart()", 30000);
}


var round = 0;


// Function enclanché à chaque restart de la progress_bar

function restart() {

    // A chaque restart on lave les ajouts CSS

    let bar = document.getElementById("bar");
    let progres = document.getElementsByClassName("progress-bar");


    document.getElementById("floatingInput").style.border = "";
    document.getElementById("bar").classList.replace("bg-success", "bg-warning")
    document.getElementById("labelInput").innerHTML = " Donnez moi le nom d'artiste ou le nom de la musique. SANS CARACTERE !";
    document.getElementById("floatingInput").disabled = false;
    document.getElementById("reponseDiv").classList.replace("visible", "invisible");
    document.getElementById("reponseGame").innerHTML = "";
    document.getElementById("reponseNot").innerHTML = "";


    bar.classList.remove("progress-bar");

    void bar.offsetWidth;

    // On remove les sessionStorage utile pour le jeu, si un utilisateur est trouvé, une variable 1/0 va être stocké ici
    sessionStorage.removeItem("bloque_artiste");
    sessionStorage.removeItem("bloque_musique");
    sessionStorage.removeItem("finder_musique");
    sessionStorage.removeItem("finder");
    sessionStorage.removeItem("finder_artiste");

    // A chaque restart, time 
    round = round + 1;


    // Si Round == au nombre de round sélectionner par l'utilisateurn on stoppe tout !
    if (round ==  localStorage.getItem('round_multiplayer')){
        window.location.href = '../Game/EndOfRoom/index.php';
        bar.classList.remove("progress");
        sessionStorage.setItem("points", points);

        const visibility2 = document.getElementById("reponse");
        visibility2.style.visibility = "hidden";
        StopFunction();

        // Sinon on relance le code, avec la progress bar

    } else {

        bar.classList.add("progress-bar");
    }

    const hidden = document.getElementById("hidden");
    hidden.style.visibility = "visible";

}

let j = 0;

function Validation() {

    // CSS
    document.getElementById("floatingInput").value = "";

    // Système de point si on trouve un artiste
    if (sessionStorage.getItem("finder") == 1) {

        j = +`${points}`;

        document.getElementById("points").innerHTML = j

        sessionStorage.setItem("finder", 2);
    }

    // Système de point si on trouve une musique

    if (sessionStorage.getItem("finder_musique") == 1) {

        j = +`${points}`;

        document.getElementById("points").innerHTML = j;

        sessionStorage.setItem("finder_musique", 2);

        // Si l'utilisateur trouve le musique et que l'artiste a déjà été trouvé

        if (sessionStorage.getItem("bloque_artiste") == 1) {

            document.getElementById("reponseDiv").classList.replace("invisible", "visible");
            document.getElementById("reponseGame").innerHTML = "Vous avez trouvé l'artiste & la musique, bravo !";
            document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
            document.getElementById('reponseNot').innerHTML = "";
            document.getElementById("floatingInput").disabled = true;
            document.getElementById("labelInput").innerHTML = "Attendez le prochain round !";
            document.getElementById("floatingInput").style.border = "";
            document.getElementById("bar").classList.replace("bg-warning", "bg-success")

            // Sinon
        } else {
            document.getElementById("reponseDiv").classList.replace("invisible", "visible");
            document.getElementById("reponseGame").innerHTML = "Vous avez trouvé le nom de la musique";
            document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
            document.getElementById("reponseNot").innerHTML = "";
            document.getElementById("floatingInput").style.border = "6px solid B4EDD2"
            document.getElementById("floatingInput").style.border = "";

        }


    }

    // Système de point si tu trouves un artiste

    if (sessionStorage.getItem("finder_artiste") == 1) {

        j = +`${points}`;

        document.getElementById("points").innerHTML = j;

        sessionStorage.setItem("finder_artiste", 2);

         // Si l'utilisateur trouve l'artiste et que la musique a été trouvé

        if (sessionStorage.getItem("bloque_musique") == 1) {

            document.getElementById("reponseDiv").classList.replace("invisible", "visible");
            document.getElementById("reponseGame").innerHTML = "Vous avez trouvé l'artiste & la musique, félications";
            document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
            document.getElementById('reponseNot').innerHTML = "";
            document.getElementById("floatingInput").disabled = true;
            document.getElementById("labelInput").innerHTML = "Attendez le prochain round !";
            document.getElementById("floatingInput").style.border = "";
            document.getElementById("bar").classList.replace("bg-warning", "bg-success")

        } else {
            document.getElementById("reponseDiv").classList.replace("invisible", "visible");
            document.getElementById("reponseGame").innerHTML = "Vous avez trouvé l'artiste";
            document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
            document.getElementById('reponseNot').innerHTML = "";
            document.getElementById("floatingInput").style.border = "";
        }


    }
}

let points = 0;
let bloque_artiste = 0;
let bloque_musique = 0;

let arrayPro = []

function getValue() {

    // Reset de arrayPro a chaque getValue().
    arrayPro = []

    // Ce qui est inseré dans l'input je le mets en majuscule.

    let input = document.getElementById("floatingInput").value;
    input = input.toUpperCase();

    // Selection égale au nom de la musique en majuscule

    let selection = (`${music}`).toUpperCase();

    // Ajout dans un tableau simple = arr la variable pour la décomposer.

    var arr = [];

    arr.splice(1, 0, `${music}`);


    // Décompose la variable musique ( ROCK /ACDC-HIGHRJEJ.mp3" et ce qui est après le / je me le mets
    // dans une variable )

    var slash = selection.split("/");

    selection = slash[1];
    categorie = slash[0];


    if(categorie == "DESSIN_ANIME"){

        let elem = selection.split('-');

        let song = elem[0];

    
        
       if(song == input){

    
        bloque_artiste = 1;
        bloque_musique = 1;
        finder = 1;

        document.getElementById("floatingInput").style.border = " ";
        sessionStorage.setItem("bloque_artiste", bloque_artiste);
        sessionStorage.setItem("bloque_musique", bloque_musique);
        sessionStorage.setItem("finder", finder);
        points = +`${points}` + 2;

        document.getElementById("reponseDiv").classList.replace("invisible", "visible");
        document.getElementById("reponseGame").innerHTML = "Vous avez trouvé, bien joué ! <br> Votre réponse : " + input;
        document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
        document.getElementById('reponseNot').innerHTML = "";
        document.getElementById("floatingInput").disabled = true;
        document.getElementById("labelInput").innerHTML = "Attendez le prochain round !";
        document.getElementById("bar").classList.replace("bg-warning", "bg-success")
        document.getElementById("floatingInput").style.border = "";
        
       
       }else{

       document.getElementById('reponseNot').innerHTML = "Mauvaise réponse !";
        document.getElementById("reponseDiv").classList.replace("visible", "invisible");

        document.getElementById("floatingInput").style.border = "6px solid #e74c3c";

       }


    }else{


    var elem = selection.split('-');

    let artiste = elem[0];

    let musique = elem[1];


    let car2 = musique.length;
    car2 = car2 - 2;

    let car_artiste = artiste.length;
    car_artiste = car_artiste - 3;

    let two = car_artiste + car2;
    two = two + 3;

    arrayPro.push(artiste + " " + musique);


    if (!((arrayPro == input) ||
            (artiste.search(input != 1) && input == artiste && input.length >= car_artiste && (input !== musique) && sessionStorage.getItem("bloque_artiste") != 1) ||
            (musique.search(input) != 1) && input == musique && input.length > car2 && (input !== artiste) && sessionStorage.getItem("bloque_musique") != 1)) {

        document.getElementById('reponseNot').innerHTML = "Mauvaise réponse !";
        document.getElementById("reponseDiv").classList.replace("visible", "invisible");

        document.getElementById("floatingInput").style.border = "6px solid #e74c3c";


    }



    if (arrayPro == input) {
  
        bloque_artiste = 1;
        bloque_musique = 1;
        finder = 1;

        document.getElementById("floatingInput").style.border = " ";
        sessionStorage.setItem("bloque_artiste", bloque_artiste);
        sessionStorage.setItem("bloque_musique", bloque_musique);
        sessionStorage.setItem("finder", finder);
        points = +`${points}` + 2;

        document.getElementById("reponseDiv").classList.replace("invisible", "visible");
        document.getElementById("reponseGame").innerHTML = "Vous avez trouvé l'artiste & la musique, félications";
        document.getElementById("reponseDiv").style.border = "5px solid B4EDD2"
        document.getElementById('reponseNot').innerHTML = "";
        document.getElementById("floatingInput").disabled = true;
        document.getElementById("labelInput").innerHTML = "Attendez le prochain round !";
        document.getElementById("bar").classList.replace("bg-warning", "bg-success")
        document.getElementById("floatingInput").style.border = "";

      
    }

    if ((artiste.search(input != 1) && input == artiste && input.length >= car_artiste && (input !== musique) && sessionStorage.getItem("bloque_artiste") != 1)) {


        bloque_artiste = 1;
        sessionStorage.setItem("bloque_artiste", bloque_artiste);
        sessionStorage.setItem("finder_artiste", 1);
        points = +`${points}` + 1;
    }


    if ((musique.search(input) != 1) && (input == musique) && (input.length > car2) && (input !== artiste) && sessionStorage.getItem("bloque_musique") != 1) {


        bloque_musique = 1;
        sessionStorage.setItem("bloque_musique", bloque_musique);
        sessionStorage.setItem("finder_musique", 1);
        points = +`${points}` + 1;

    }


}  } 


function DisplaySon(){


    const musicDisplay = music.split("/")

    let categorieDisplay = musicDisplay[0];

    let NameDisplay = musicDisplay[1];

    if(categorieDisplay == "DESSIN_ANIME"){

        const daDisplay = NameDisplay.split("-")

        let nameDaDisplay = daDisplay[0];

        document.getElementById("old_response").innerHTML = "Réponse de l'ancien round est : " + nameDaDisplay;


    }else{
        
        document.getElementById("old_response").innerHTML = "Réponse de l'ancien round est : " + NameDisplay;
    }



}