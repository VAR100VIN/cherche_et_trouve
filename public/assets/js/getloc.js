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
	var sendAjax = $.ajax({
		type: "POST",
		url: 'HomeController.php',
		data: 'lat='+latitude+'&lng='+longitude+'&adr='+addr,
		success: handleResponse
	   });
    // Do stuff
}
let date1 = Date();
console.log(date1);
document.getElementById('p1').innerHTML = date;