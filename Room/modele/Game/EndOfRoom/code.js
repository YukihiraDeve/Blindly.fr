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
/*
    var req_points = "points=" + points;

    var xhx = new XMLHttpRequest();

    xhx.onreadystatechange = function(){

        if(xhx.readyState === 4){

        var servResponse = document.getElementById("serverResponse");
        servResponse = xhx.responseText;
        }
    };
    xhx.open("POST","index.php")
    xhx.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhx.send(req_points);
*/
}

localStorage.clear();

//setTimeout(function(){ window.location.href='/Center/index.php'},20000);
