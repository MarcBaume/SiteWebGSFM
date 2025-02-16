<!DOCTYPE html>
<html>
<head>
	<meta property="og:description" content="chronométrage, chrono, jura, franches-montagnes, Jura défi, course à pied, Sport, Jura défi chrono" />  
	<title>Défi Chrono</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=yes">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" title="defaut" media="screen" href="styleV2.css" type="text/css"/>
<!--	<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="style-mobilV2.css" /> -->
<script src="js/prototype.js" >

</script>
<script>

var myVar=setInterval(function(){myTimer()},4000);
var MonTableau = ["membre1.png","membre2.png","membre3.png","membre4.png", "membre.png"];
var i = 0;
function myTimer() {		

 //WritePosition();


}



    function ReadPosition()
{
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(sucessGeo, echecGeo);
	}
	else
	{
		alert("Pas de prise en charge de la géolcalisation");
	}


}

// Function callback en cas de succés
function sucessGeo(position){
	var lat = position.coords.latitude;
	var lng = position.coords.longitude;
    document.getElementById("Lng").value =lat ;
    document.getElementById("Lat").value =lng ;
    document.getElementById("Heure").value =  Date.now() ;
}
// Function callback en cas de échec
function echecGeo(error){
	switch(error.code)
	{
		case error.PERMISSION_DENIED :
		alert("la permission de récupèérer la position n'a pas été accordée");
		break;
		default : alert("Erreur : " +error.message);
	}
}

function WritePosition()
{
	ReadPosition();
// Appelle fonction php pour vérifier que le coupon existe
		$('formCode').request({
		onComplete: function(transport){
            console.log("test");
			 val =transport.responseText.evalJSON();
             console.log(val  );
        }
        });
}
        </script>

        <form id="formCode" method="get" action="SavePosition.php" >
			
				<input type="input" name="Lng" id="Lng"   readonly />
				<input type="input" name="Lat" id="Lat"  />
				<input type="input" name="Heure" id="Heure"  />
	
				<input type="button"  id="ButtonSend" value="Je suis ici" onclick="WritePosition()" style= "font-size:72px; width: 500px; height: 500px";>  </br>
	
		</form>	

        <script>
			ReadPosition();
        </script>
