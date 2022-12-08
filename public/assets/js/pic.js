let canvas = document.querySelector("#canvas");
let context = canvas.getContext("2d");
let video = document.querySelector("#video");

if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true}).then((stream) => {
        video.srcObject = stream;
        video.play();
    });
}

document.getElementById('snap').addEventListener('click', ()=>{
    context.drawImage(video, 0,0,640, 480)
})
// On vérifie que la méthode est implémenté dans le navigateur
if ( navigator.geolocation ) {
	// On demande d'envoyer la position courante à la fonction callback
	navigator.geolocation.getCurrentPosition( callback, erreur );
} else {
	// Function alternative sinon
	alternative();
}

function erreur( error ) {
	switch( error.code ) {
		case error.PERMISSION_DENIED:
			console.log( 'L\'utilisateur a refusé la demande' );
			break;     
		case error.POSITION_UNAVAILABLE:
			console.log( 'Position indéterminée' );
			break;
		case error.TIMEOUT:
			console.log( 'Réponse trop lente' );
			break;
	}
	// Function alternative
	alternative();
};
function callback( position ) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    console.log( lat, lng );
    // document.getElementById('latitude').innerHTML= position.coords.latitude
    // document.getElementById('longitude').innerHTML= position.coords.longitude
	// var sendAjax = $.ajax({
	// 	type: "POST",
	// 	url: 'HomeController.php',
	// 	data: 'lat='+latitude+'&lng='+longitude+'&adr='+addr,
	// 	success: handleResponse
	//    });
    // Do stuff
}
let date1 = Date();
console.log(date1);
document.getElementById('p1').innerHTML = date;
$("#save").click(function()  {

    console.log('mesv')
    console.log(canvas.toDataURL('medias/upload'))
    $.ajax({
       type: "POST",
       url: 'apiphoto',
       dataType: 'text',
       data:  {
      image : canvas.toDataURL('medias/upload'),
    //   user: document.getElementById('user-id').innerHTML,
    //   plant: document.getElementById('plant-id').innerHTML,
      longitude: document.getElementById('longitude').innerHTML,
      latitude: document.getElementById('latitude').innerHTML,
      }
    });
  });