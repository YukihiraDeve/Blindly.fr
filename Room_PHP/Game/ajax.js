
const start = localStorage.getItem("number");



if(start != 0){

        const request2 = new XMLHttpRequest();

       request2.onreadystatechange = function(){
         if (this.readyState===4){
           
         }
        };
    request2.open("GET", "game.php?q=" + start, true);
       request2.send();
}



window.onload = secu2();

function secu2(){
    if(localStorage.getItem("secu_for_game") == 10){
        window.location.href='/Center/index.php'
    }
}

  
function settingsSound() {
  const settings = document.getElementById('customRange2').value
  const sound = document.getElementById('music');

  sound.volume = 0.050;

  if (settings == 0) {
    sound.volume = 0

  }
  if (settings == 1) {
    sound.volume = 0.05
  }
  if (settings == 2) {
    sound.volume = 0.15
  }
  if (settings == 3) {
    sound.volume = 0.20
  }
  if (settings == 4) {
    sound.volume = 0.25
  }
  if (settings == 5) {
    sound.volume = 0.30
  }
  if (settings == 6) {
    sound.volume = 0.35
  }
  if (settings == 7) {
    sound.volume = 0.40
  }
  if (settings == 8) {
    sound.volume = 0.45
  }
  if (settings == 10) {
    sound.volume = 0.50
  }
  if (settings == 11) {
    sound.volume = 0.55
  }
  if (settings == 12) {
    sound.volume = 0.60
  }
  if (settings == 13) {
    sound.volume = 0.65
  }
  if (settings == 14) {
    sound.volume = 0.70
  }
  if (settings == 15) {
    sound.volume = 0.75
  }
  if (settings == 16) {
    sound.volume = 0.80
  }
  if (settings == 17) {
    sound.volume = 0.85
  }
  if (settings == 18) {
    sound.volume = 0.90
  }
  if (settings == 19) {
    sound.volume = 0.95
  }
  if (settings == 20) {
    sound.volume = 1
  }
}