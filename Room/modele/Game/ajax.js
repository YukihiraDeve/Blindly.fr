
const start = localStorage.getItem("name");
console.log(start)

        const request2 = new XMLHttpRequest();

       request2.onreadystatechange = function(){
         if (this.readyState===4){       
         }
        };
    request2.open("GET", "game.php?q=" + start, true);
       request2.send();



window.onload = secu2();

function secu2(){
    if(localStorage.getItem("secu_for_game") == 10){
        window.location.href='/Center/index.php'
    }
}