function changeColor(){

    const btow = document.getElementsByClassName("btow")[0];

    btow.classList.toggle("bg-primary");

    const wtob = document.getElementsByClassName("wtob")[0];
    wtob.classList.toggle("text-white");

    const dtow = document.getElementsByClassName("dtow")[0];
    dtow.classList.toggle("text-white");

    document.getElementsByClassName("dtow")[0].classList.remove("bg-light");
    document.getElementsByClassName("wtod")[0].classList.remove("text-dark");
    document.getElementsByClassName("wtod")[1].classList.remove("text-dark");

    document.getElementsByClassName("dtow")[0].classList.remove("bg-light");
    document.getElementsByClassName("wtod")[0].classList.remove("text-dark");
    document.getElementsByClassName("wtod")[1].classList.remove("text-dark");

    document.getElementsByClassName("dtor")[0].classList.remove("bg-danger");
    document.getElementsByClassName("rtow")[0].classList.remove("text-white");


}

function normalSelector(){

    const dtow  = document.getElementsByClassName("dtow")[0];

    dtow.classList.toggle("bg-light");

    const wtod2 = document.getElementsByClassName("wtod")[0];
    wtod2.classList.toggle("text-dark");

    const wtod = document.getElementsByClassName("wtod")[1];
    wtod.classList.toggle("text-dark");

    document.getElementsByClassName("dtor")[0].classList.remove("bg-danger");
    document.getElementsByClassName("rtow")[0].classList.remove("text-white");

    document.getElementsByClassName("btow")[0].classList.remove("bg-primary");
    document.getElementsByClassName("wtob")[0].classList.remove("text-white");


}

function colorRoyale(){
    const dtor = document.getElementsByClassName("dtor")[0];

    dtor.classList.toggle("bg-danger");

    const rtow = document.getElementsByClassName("rtow")[0];
    rtow.classList.toggle("text-white");


    document.getElementsByClassName("dtow")[0].classList.remove("bg-light");
    document.getElementsByClassName("wtod")[0].classList.remove("text-dark");
    document.getElementsByClassName("wtod")[1].classList.remove("text-dark");

    document.getElementsByClassName("btow")[0].classList.remove("bg-primary");
    document.getElementsByClassName("wtob")[0].classList.remove("text-white");
}

function changement(){

    const secu = 10;
    const round = document.getElementById("Round").innerHTML;

    localStorage.setItem('round_multiplayer', round);


 
    localStorage.secu = secu;
    localStorage.round = round;

    window.location.href = 'Game/index.php'

};


function selection(){
    const selection = document.getElementsByClassName("selection");

}


function rock(){
    console.log("3");
    hidden = document.getElementById('Hidden');

    hidden.setAttribute("name","rock");
}



let secu2 = localStorage.getItem("secu");

if(secu2 == 10){
    console.log("tu jartes")
    window.location.href='/Center/index.php'
}
