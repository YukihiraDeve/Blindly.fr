function debut(){
  start = Date.now();
  console.log(start);
}

let url = window.location.href;
url = url.substring(19);

function fin(){
  end = Date.now();
  total = end - start;
  total = total / 1000;
  var json_upload = "secondes=" + JSON.stringify(total) + "&url=" + JSON.stringify(url);
  var hxh = new XMLHttpRequest();
  hxh.open("POST", "tracker.php");
  hxh.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  hxh.send(json_upload);
}

/*
addEventListener('unload', (event) => {
    fin();
});

window.onunload = (event) => {
  fin();
}
*/
