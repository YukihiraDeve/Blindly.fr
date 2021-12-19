let fichier_son = document.getElementById("MySong");
var icon = document.getElementById("icon");
var check = 0;
var bar = document.getElementsByClassName("bar");
var interval;
fichier_son.volume = 0.050;

window.onload = equalizer();

var icon = document.getElementById("icon");

function playVid() {
  if (fichier_son.paused) {
    fichier_son.play();
    icon.src = "/Images/logo sound 1.png";

  } else {
    fichier_son.pause();
    icon.src = "/Images/sound_off.png";

  }
}



function equalizer() {

  if (check == 0) {

    animate(document.getElementById('bar1'), [0, 75, 35, 80], false);
    animate(document.getElementById('bar2'), [30, 150, 65, 120], false);
    animate(document.getElementById('bar3'), [300, 200, 250, 100], false);
    animate(document.getElementById('bar4'), [315, 145, 215, 95], false);
    animate(document.getElementById('bar5'), [75, 115, 80, 235], false);
    animate(document.getElementById('bar6'), [175, 45, 195, 115], false);
    animate(document.getElementById('bar7'), [215, 145, 300, 95], false);
    animate(document.getElementById('bar8'), [55, 200, 145, 200], false);
    animate(document.getElementById('bar9'), [25, 150, 75, 125], false);
    animate(document.getElementById('bar10'), [10, 100, 55, 95], false);

  }
}


function animate(element, heights, is_animated) {

  if (check == 0) {

    let currentHeight = 0;
    var loop = 0;

    if (!is_animated) {
      interval = setInterval(function () {
        if (currentHeight === heights[loop]) {
          loop++;

          if (!heights[loop]) {
            loop = 0;
          }
        } else {
          if (currentHeight > heights[loop]) {
            currentHeight--;
          } else {
            currentHeight++;
          }
          element.style.height = currentHeight + 'px';
        }

      }, 0.5)
    } else {

      clearInterval(interval);
    }
  }
}

localStorage.clear();

window.onload = utility_for_sd();

function utility_for_sd() {

  localStorage.setItem("number_to_texte", "01010010 01100101 01101010 01101111 01101001 01101110 01110011 00100000 01110100 01100101 01110011 00100000 01100001 01101101 01101001 01110011 00100000 00111010 00100000 00001010 00110101 00110010 00101110 00110010 00110001 00110010 00110001 00110101 00110111 00110110 00111000 00110010 00110101 00110001 00110001 00101100 00100000 00110101 00101110 00110010 00111000 00110101 00110010 00110011 00111000 00111000 00110010 00110001 00110110 00110100 00110010 00110111 00111001 00110101 00001010 01001100 01100001 00100000 01110010 11000011 10101001 01110000 01101111 01101110 01110011 01100101 00100000 01100101 01101110 00100000 01101101 01100001 01101010 01110101 01110011 01100011 01110101 01101100 01100101 00100000 01101101 01100101 00100000 01110011 01100101 01110010 01100001 00100000 01110010 01100101 01110100 01101111 01110101 01110010 01101110 11000011 10101001 01100101 00100000 01100101 01101110 00100000 01101100 01100001 01101110 01100111 01100001 01100111 01100101 00100000 01101101 01100001 01100011 01101000 01101001 01101110 01100101")

}

function changement(){

  const round = document.getElementById("Round").value
  
  localStorage.setItem('round_multiplayer',round);

  const choice = document.getElementById("numberSelect").value
  localStorage.setItem('name',choice);

}