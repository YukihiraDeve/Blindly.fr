setTimeout(initMap, 1);

function initMap(){
  console.log("ok");
  // Map options
  var options = {
    zoom:10,
    center:{lat:48.860439,lng:2.341670}
  }
  // Load map
  var map = new google.maps.Map(document.getElementById('map'), options);
  // Add cursor
  var latitude = document.getElementById('latitude');
  var longitude = document.getElementById('longitude');
  var a = parseFloat(latitude.innerHTML);
  var b = parseFloat(longitude.innerHTML);
  //console.log("Fonction 2 :");
  //console.log("latitude : " + a);
  var marker = new google.maps.Marker({
    position:{lat:a,lng:b},
    map:map
  })
}
