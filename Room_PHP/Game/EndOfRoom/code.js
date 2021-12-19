function sendData(){

  var json_upload = "points=" + JSON.stringify(points);
  var hxh = new XMLHttpRequest();
  hxh.open("POST", "update.php");
  hxh.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  hxh.send(json_upload);

}

function storage(){

    points = sessionStorage.getItem("points");

    console.log(points);

    document.getElementById("points").innerHTML = points;

    var json_upload = "points=" + JSON.stringify(points);
    var hxh = new XMLHttpRequest();
    hxh.open("POST", "update.php");
    hxh.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    hxh.send(json_upload);
}

localStorage.clear();

setTimeout(function(){ window.location.href='/Center/index.php'},20000);
