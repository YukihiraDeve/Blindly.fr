var points = 0;
var valeur = 0;

function Init() {

    document.getElementById("rectangle").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle1").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle2").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle3").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle4").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle5").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle6").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle7").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";
    document.getElementById("rectangle8").src = "/ImagesCapcha/image" + Math.floor(Math.random() * 2) + ".png";

    const why2 = document.getElementsByClassName("validation2")[0];
    why2.classList.remove("visible");
    why2.classList.toggle("invisible");


    const verification = document.getElementsByClassName("parent_verif")[0];
    verification.classList.remove("invisible");
    verification.classList.toggle("visible");

    const wh = document.getElementsByClassName("validation2")[0];
    wh.classList.remove("invisible");
    wh.classList.toggle("visible");

    const why5 = document.getElementsByClassName("validation2")[0];
    why5.classList.remove("visible");
    why5.classList.toggle("invisible");


    // const verification2 = document.getElementsByClassName("parent_verif")[2];
    // verification2.classList.remove("invisible");
    // verification2.classList.toggle("visible");


}

function exit(){

}

function check1() {

    if (document.getElementById("rectangle").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle").src = "/ImagesCapcha/image0.png";
        }
    }


}

function check2() {
    if (document.getElementById("rectangle1").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle1").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle1").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle1").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check3() {
    if (document.getElementById("rectangle2").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle2").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle2").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle2").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check4() {
    if (document.getElementById("rectangle3").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle3").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle3").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle3").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check5() {
    if (document.getElementById("rectangle4").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle4").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle4").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle4").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check6() {
    if (document.getElementById("rectangle5").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle5").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle5").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle5").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check7() {
    if (document.getElementById("rectangle6").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle6").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle6").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle6").src = "/ImagesCapcha/image0.png";
        }
    }
}

function check8() {
    if (document.getElementById("rectangle7").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle7").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle7").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle7").src = "/ImagesCapcha/image0.png";
        }
    }

}

function check9() {
    if (document.getElementById("rectangle8").src.indexOf("image0.png") >= 0) {
        document.getElementById("rectangle8").src = "/ImagesCapcha/image1.png";
    } else {
        if (document.getElementById("rectangle8").src.indexOf("image1") >= 0) {
            document.getElementById("rectangle8").src = "/ImagesCapcha/image0.png";
        }
    }
}

function verif(){

    const rectangle8 = document.getElementById("rectangle8").src;
    const rectangle7 = document.getElementById("rectangle7").src;
    const rectangle6 = document.getElementById("rectangle6").src;
    const rectangle5 = document.getElementById("rectangle5").src;
    const rectangle4 = document.getElementById("rectangle4").src;
    const rectangle3 = document.getElementById("rectangle3").src;
    const rectangle2 = document.getElementById("rectangle2").src;
    const rectangle1 = document.getElementById("rectangle1").src;
    const rectangle = document.getElementById("rectangle").src;


    if ((rectangle.search("image0.png") >= 0) &&
        (rectangle1.search("image0.png") >= 0) &&
        (rectangle2.search("image0.png") >= 0) &&
        (rectangle3.search("image0.png") >= 0) &&
        (rectangle4.search("image0.png") >= 0) &&
        (rectangle5.search("image0.png") >= 0) &&
        (rectangle6.search("image0.png") >= 0) &&
        (rectangle7.search("image0.png") >= 0) &&
        (rectangle8.search("image0.png") >= 0)) {
        console.log("oui");
        console.log("reussi");

        document.getElementById("rectangle").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle1").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle2").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle3").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle4").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle5").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle6").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle7").src = "/ImagesCapcha/image3.png"
        document.getElementById("rectangle8").src = "/ImagesCapcha/image3.png"


        const verification = document.getElementsByClassName("parent_verif")[0];
        verification.classList.remove("visible");
        verification.classList.toggle("invisible");


        const why = document.getElementsByClassName("validation2")[0];
        why.classList.remove("invisible");
        why.classList.toggle("visible");

        // const verification = document.getElementsByClassName("visible")[1];
        // verification.classList.remove("visible");
        // verification.classList.toggle("invisible");

        valeur++;
        console.log("valeur : " + valeur);
        //return true;

    } else {
        console.log("valeur " + valeur);
        //window.location.href = '/index.html';
        //return false;
    }
    //return false;
}

function verifCaptcha(){
  if (valeur === 1) {
    return true;
  } else {
    return false;
  }
}
