<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<?php include("head.php"); ?>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?>

<!---  ***************************** Affichage des catégorie  *************************** ------->

<script>
var ArrayCoureurs = [];
var ArrayParcours = [];
var ICounterCoureurs = 0;
</script>

		<!--- Liste des parcours !---->
		<?php
		$DateCourse =  date_parse("2022-11-06");
		$NOM_COURSE = 'La Verticale des Franches';
		$ANNEE_COURSE = '2022';
		// Afficher la liste des Parcours  Dossier dans la course ;
		$pathfolder = 'defichrono/courses/'.$NOM_COURSE.$ANNEE_COURSE;

 ?>
     
<Div id="corps">
<script>
	function ColorMenuParcours()
{
	for (var i = 0; i < ArrayParcours.length; i++) 
	{
		// Obtenir la position de chaque element 
		var mon_element = document.getElementById(ArrayParcours[i].nom);
		// Si dernière position du tableau on regarde quand cette valeur
		if (i == ArrayParcours.length-1)
		{
		
			if ( document.documentElement.scrollTop >= ArrayParcours[i].PositionTop ) {
				mon_element.classList.add("nav-colored");
				mon_element.classList.remove("nav-transparent");
			} 
			else {
				mon_element.classList.add("nav-transparent");
				mon_element.classList.remove("nav-colored");
			}
		}
		else // Couleur seulement le menu afficher le menu au dessus ne s'affiche plus en couleur
		{
			if ( document.documentElement.scrollTop >= ArrayParcours[i].PositionTop &&   document.documentElement.scrollTop < ArrayParcours[i+1].PositionTop) {
				mon_element.classList.add("nav-colored");
				mon_element.classList.remove("nav-transparent");
			} 
			else {
				mon_element.classList.add("nav-transparent");
				mon_element.classList.remove("nav-colored");
			}
		}
   }
}
</script>
<!--	<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="style-mobilV2.css" /> -->
<style>


	</style>
</head>
<?php 
setlocale (LC_TIME, 'fr_FR.utf8','fra');?>

    <body >

<table  style=" Height: 30px; position: fixed; margin-top: 200px;padding: 10px;   width :100%;z-index:1040;">
	<tr id="MenuCourse" >

	</tr>
</table>



<div id="corps"  style="position: absolut, margin 10px;padding :2%; margin-top: 50px" >
<div class="title">	Course  des Franches 2022  </div>
<p>
 <B>UN GRAND MERCI POUR LES NOMBREUX PARTICIPANTS</B> </br>
</p>
<p>
<a style="font-size: 24px;" href="https://www.juradefichrono.ch/ResultatV3.php?NbrEtape=1&DateCourse=2022-06-17&Etape=0&NomCourse=Course+des+Franches&ID=91" target="_blank">Résultats ici </a>
</p>
<p>
<a style="font-size: 24px;" href="photo.php" target="_blank">Photos ici </a>
</p>
<p>
<a style="font-size: 24px;">Prochainement encore d'autres photos </a>
</p>
<div class="title">Date à retenir  </div>

          <p>  	La verticale des franches le <B> dimanche 06 novembre 2022 </B></br> </br> </br> </p>
		  <p>   Notre course d'orientation en la mémoire de notre ami Christophe Dousse le <B>dimanche 4 septembre 2022 </B></br> Information à venir</br>
		  <p>   Course des Franches 2023<B>vendredi 16 juin 2023 </B></br></br>
</p>


<div class="title">	Défi Bol dair 20022, en courant, en marchant ou en VTT  </div>
<center>
<a ><img src="photo/defiBolDair.jpg"  Height=300px alt=""  /></a><a>   </a>
</center>
<p>
Le GS Franches Montagnes propose aux amoureux de la nature un sublime parcours au tour du chef-lieu du haut- plateau des Franches-Montagnes. Le départ vous fera grimper directement à l’impressionnante arête des Sommêtres, la plus grande difficulté du parcours. Levez les yeux du terrain pour admirer la magnifique paroi rocheuse. Depuis là, une splendide descente le long d’un petit sentier féérique en direction du pont de Muriaux.
</br></br>
La partie roulante s’ouvre à vous : traversez les grands pâturages boisés et parsemés de sapins qui vous ramèneront vers le chemin de retour dessiné parmi des tourbières. Allez reprendre votre souffle au Centre Nature des Cerlatez avant de vous replonger dans un paysage authentique d’une réserve naturelle qui vous fera découvrir une petite merveille méconnue : l’Etang des Royes, petit frère de l’incontournable Etang de la Gruère.
</br></br>
Si vous pensez que vous aviez tout vu, les dernières foulées vous surprendront amplement. Savourez les derniers kilomètres de jolis sentiers splendides avant de boucler votre virée en décapsulant une délicieuse bière artisanale à la BFM. Dépêchez-vous !!! C’est bientôt l’heure de l’apéro !!!!</p>

<p><a style="font-size: 24px;" href="https://www.movvin.ch/events/10" target="_blank">Plus d'informations</a></p>


<div class="title">	Verticale  des Franches 2022  </div>
<p>
<a style="font-size: 24px;" href="https://www.juradefichrono.ch/formulaireV3.php?NbrEtape=1&DateCourse=2022-11-06&Etape=1&NomCourse=La+Verticale+des+Franches&ID=99" target="_blank">Inscription pour la verticale des franches </a>
</p>
<?php 



if ( strlen($val ["Description"] ) > 1)
{ ?>
<div class="title">Description :</div>
	<p>

		<?php echo $val ["Description"] ?>
		</p>

<?php
}
if ( strlen($val ["Informations"] ) > 1)
{ ?>
  <div class="title"> Informations </Div>
  <Fieldset>

	<?php echo $val ["Informations"] ?> 
  </Fieldset>
	<?php
}
?>
 <script>
var ArrayCoureurs = [];
var ArrayParcours = [];
var ICounterCoureurs = 0;
var TotalDiminution = 0;
var TotalELevation = 0;
var StartElevation = 0;
var ElevationMin = 10000;
var ElevationMax = 0;
var TotalKM = 0;
var Width  = 800;//133 screen.width -200; // 1300
var Height = (Width /100) *18;
var DecalageStartWidth = 50; // Valeur de décalage du commencement du graphique en horizontal
var DecalageStartHeight = 50; // Valeur de décalage du commencement du graphique en vertical
var indexPassage = 1;
/*_____________________________________________________________________

			Enregistrement sur le "coordonnée"	des valeur de position du text sur le graphique de dénivellé 
_____________________________________________________________________*/

function ChangOffsetText()
{
	$('formOffset').request({
		onComplete: function(transport){
		console.log('1');
			var errors = transport.responseText.evalJSON();
			var message = "";
			
			for (var id in errors)
			{
				console.log("id" + errors[id]);
				message = message+ "\n - "+ errors[id];
			}
					console.log(message);
			if (message = "")
			{
				alert("Félicitations !");
			}
			else
			{
				alert("Veuillez vérifier les champs suivants : "+ message);
			}
		
		}
	});
}

function TableResume(IDSVG, ColimgEtapePara)
{
	
	TableTotal2 = document.createElement('Table');
	TableTotal2.style.width ="100%";
	tr1 = document.createElement('Tr');
	
	td1 = document.createElement('Td');
	td1.style.width = "20%";
	td1.innerHTML = "Total distance : ";
	tr1.append(td1);
	
	td2 = document.createElement('Td');
	td2.style.width = "15%";
	td2.setAttribute("id", IDSVG+"TotalKM");
	tr1.append(td2);
	
	td3 = document.createElement('Td');
	td3.style.width = "20%";
	td3.innerHTML = "Total D+ : ";
	tr1.append(td3);
	
	td4 = document.createElement('Td');
	td4.style.width = "15%";
	td4.setAttribute("id", IDSVG+"ELevationTotal");
	tr1.append(td4);
	
	td5 = document.createElement('Td');
	td5.style.width = "20%";
	td5.innerHTML = "Total D- : ";
	tr1.append(td5);
	
	td6 = document.createElement('Td');
	td6.style.width = "15%";
	td6.setAttribute("id", IDSVG+"DiminutionTotal");
	tr1.append(td6);
	TableTotal2.append(tr1);
	
	tr2 = document.createElement('Tr');
	
	td11 = document.createElement('Td');
	td11.style.width = "20%";
	td11.innerHTML = "altitude Min : ";
	tr2.append(td11);
	
	td12 = document.createElement('Td');
	td12.style.width = "15%";
	td12.setAttribute("id", IDSVG+"ElevationMin");
	tr2.append(td12);
	
	td13 = document.createElement('Td');
	td13.style.width = "20%";
	td13.innerHTML = "altitude Max :";
	tr2.append(td13);
	
	td14 = document.createElement('Td');
	td14.style.width = "15%";
	td14.setAttribute("id", IDSVG+"ElevationMax");
	tr2.append(td14);
	TableTotal2.append(tr2);
	
	ColimgEtapePara.append(TableTotal2);
	
}

function mapSvg(IDSVG, FileName, ColimgEtapePara)
{
	indexPassage = 1;
	TableTotal = document.createElement('Table');
	TableTotal.style.width ="80%";
	TableTotal.setAttribute("id", IDSVG+"ImageMap");
	
		if ( screen.width>  800 )
	{
			Width  = 800; // 1300-200; // 1300
	}
	else
	{
		Width  =  screen.width ; // 1300-200; // 1300
	}
	let box = document.querySelector('div');
 Width = box.offsetWidth - 200;

	tr1 = document.createElement('Tr');
	td1 = document.createElement('Td');
	
	
	divMap = document.createElement('div');
	divMap.style.height ="300px";
	divMap.setAttribute("id", IDSVG+"my_osm_widget_map");
	
	td1.append(divMap);
	tr1.append(td1);
	TableTotal.append(tr1);
	
	tr2 = document.createElement('Tr');
	td2 = document.createElement('Td');
	
	divGraph = document.createElement('div');
	divGraph.style.height ="300px";
	divGraph.setAttribute("id", IDSVG+"conteneurSVG");
	
	td2.append(divGraph);
	tr2.append(td2);
	TableTotal.append(tr2);
	
	ColimgEtapePara.append(TableTotal);
	TableResume(IDSVG, ColimgEtapePara);

}

function AddSvg(IDSVG, FileName)
{
/*** ZONE DE DESSIN **/
 var GraphiqueSVG = document.createElementNS("http://www.w3.org/2000/svg",'svg');

    GraphiqueSVG.style.width = (Width + (DecalageStartWidth*2) ) +'px';
    GraphiqueSVG.style.height = (Height + (DecalageStartHeight*2))+'px';
    GraphiqueSVG.id = IDSVG+'image1';
	
   // GraphiqueSVG.style.position = 'absolute';
  //  GraphiqueSVG.style.top = '50px';
//	GraphiqueSVG.style.Right = '50px';

	var conteneur = document.getElementById(IDSVG+"conteneurSVG");
	console.log(IDSVG+"conteneurSVG");
	conteneur.style.height = (Height + (DecalageStartHeight*2))+'px';
    conteneur.appendChild(GraphiqueSVG);


/***************************************** READ FCIHIER GPX *******************************************
*																															*
****************************************************************************************************/	
	var CountPassage = 0;
 // Create a connection to the file.
  var Connect = new XMLHttpRequest();
  // Define which file to open and
  // send the request.
  //Connect.open("GET", "test2.xml", false);
  Connect.open("GET", FileName, false);
  Connect.setRequestHeader("Content-Type", "text/xml");
  Connect.send(null);
  // Place the response in an XML document.
  var TheDocument = Connect.responseXML;
  // Place the root node in an element.
  var Customers = TheDocument.childNodes[0];

  // Retrieve each customer in turn.
	var LastPoint = null;
	 TotalKM = 0;
	 TotalDiminution = 0;
	 TotalELevation = 0;
	 StartElevation = 0;
	 ElevationMin = 10000;
	 ElevationMax = 0;
	var ArrayPoint = [];
	var NombreKMH = 9.2;
	var HeureDepart = 5;
	var JourDepart = 4;
	var MoisDepart = 'Juillet';


	for (var i = 0; i < Customers.children.length; i++)
	{
	   var Trk = Customers.children[i];
	   // Balise TRK 
		if (Trk.tagName == "trk")
		{
			for (var j = 0; j < Trk.children.length; j++)
			{
				var TrkSeg = Trk.children[j];
			//console.log(TrkSeg);
				for (var m = 0; m < TrkSeg.children.length; m++)
				{
					// ** Modifier comparer a read gpx du tour du jura
			
					var x = TrkSeg.children[m].getElementsByTagName("ele")[0];
						if (x!= undefined)
						{
						var y = x.childNodes[0];
						var elevation = y.nodeValue;
					
						//****** CALCUL ELEVATION MINIMUM ******/
						if (parseFloat(elevation) < ElevationMin)
						{
							ElevationMin = elevation;							
						}
						// ****** CALCUL ELEVATION MAX *******/
						
						if (parseFloat(elevation) > ElevationMax)
						{
							ElevationMax = elevation;
						}
			
						var lat =  TrkSeg.children[m].attributes.getNamedItem("lat").value ;
						var lon =  TrkSeg.children[m].attributes.getNamedItem("lon").value ;

						/*** CALCUL DISTANCE ENTRE DEUX POINT SANS DENIVELATION **/
						var point = new Object();
						if (LastPoint != null)
						{
							var KM =	distance(LastPoint.Lat , LastPoint.Lon,lat,lon);
							point.elevation = elevation;
							
							TotalKM = TotalKM+ KM;
							DiffElevation = 0;
							DiffDiminution = 0;
							if (parseFloat(point.elevation) > parseFloat(LastPoint.elevation))
							{
								DiffElevation = parseFloat(point.elevation) - parseFloat(LastPoint.elevation);
							}
							else
							{
								DiffDiminution = (parseFloat(LastPoint.elevation) - parseFloat(point.elevation))*-1;
							}
							point.TotalDiminution = parseFloat(LastPoint.TotalDiminution) + parseFloat(DiffDiminution);
							point.TotalELevation = parseFloat(LastPoint.TotalELevation) + parseFloat(DiffElevation);
							TotalELevation = point.TotalELevation;
							TotalDiminution =  point.TotalDiminution;
							point.Lat = lat;
							point.Lon = lon;
							point.KM = TotalKM;

						}
						else // ****** KM 0 ********
						{
							point.elevation = elevation;
							point.TotalELevation = 0;
							point.TotalDiminution = 0;
							point.Lat = lat;
							point.Lon = lon;
							point.KM = 0;
							StartElevation = elevation;
							
							//**** CREATION DÙNE CARTE ****/
							var mymap = L.map(IDSVG+'my_osm_widget_map', { /* use the same name as your <div id=""> */
							center: [point.Lat, point.Lon], /* set GPS Coordinates */
							zoom: 14, /* define the zoom level */
							zoomControl: true, /* false = no zoom control buttons displayed */
							scrollWheelZoom: false /* false = scrolling zoom on the map is locked */
							});
						L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
						//L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/[x]/{y}.png', { /* set your personal MapBox Access Token */
						maxZoom: 30, /* zoom limit of the map */
						attribution: ' <a href="http://openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(mymap);
						}
						// AJout du ponit au tableau
						point.index = ArrayPoint.length;
						ArrayPoint.push(point);
						
						///* Mise en mémoire de la position pour le prochaine calcul **)
						LastPoint = point;
					}
				}
			}

			FeneterElevation = (ElevationMax - ElevationMin);


			var TxtTotalKM = document.getElementById(IDSVG+"TotalKM");
			TxtTotalKM.innerHTML  = (parseInt(TotalKM *10)/10) + ' km';
			var TxtElevationMin = document.getElementById(IDSVG+"ElevationMin");
			TxtElevationMin.innerHTML  = Math.round(ElevationMin,2) + ' m';
			var TxtElevationMax = document.getElementById(IDSVG+"ElevationMax");
			TxtElevationMax.innerHTML  = Math.round(ElevationMax,2) + ' m';
			var TxtTotalElevation = document.getElementById(IDSVG+"ELevationTotal");
			TxtTotalElevation.innerHTML  = Math.round(TotalELevation,2) + ' m';	
			var TxtTotalDiminution = document.getElementById(IDSVG+"DiminutionTotal");
			TxtTotalDiminution.innerHTML  = Math.round(TotalDiminution,2) + ' m';			

		}
	}
	LastPoint = null;
	/*____________________________________________________________________________________________
	*																															*
		CREATION AFFICHAGE SELON LE TABLEAU DE POINT LU DANS LE FICHIER GPX 

	_____________________________________________________________________________________*/	

	/********* LEcture de chaque point sur le fichier et transformation 
	en valeur en Pourcent pour affichage
	 au meme format de chaque fichier GPX *******/
	 
	for (var i = 0; i < ArrayPoint.length; i++)
	{
		var Point = ArrayPoint[i];
		if ( LastPoint != null )
		{
			// Premier point
			if (i ==1)
			{
				AddPoint ( LastPoint, Point, mymap, GraphiqueSVG, true,false );
			}
			// Point finish
			else if (i == ArrayPoint.length-1 )
			{
				AddPoint ( LastPoint, Point, mymap, GraphiqueSVG, false,true );
			}
			else 
			{
				AddPoint ( LastPoint, Point, mymap, GraphiqueSVG, false,false );
			}
		}
		LastPoint = Point;
	}	

	/************* AJOUT LIGNE Vertical Coordonnée Y DENIVELATION **************/

	 intElevation = parseInt(ElevationMin / 100)
	 // Ligne tous les 100 mètres
	ValueElevationArrondi = intElevation * 100;

	while (ValueElevationArrondi < ElevationMax )
	{
		AddLigneElevation(ValueElevationArrondi, GraphiqueSVG );	
		
		ValueElevationArrondi = ValueElevationArrondi +100;
	}

	/************* AJOUT LIGNE Horizontal Coordonnée X KM **************/
	if (TotalKM >50)
	{
	/*** Ajout Thick ligne tous les 10 km ***/
	NbrPart = parseInt(TotalKM/10);
	partKM = TotalKM / (TotalKM/10);
	}
	else if (TotalKM >25)
	{
	/*** Ajout Thick ligne tous les 5 km ***/
	NbrPart = parseInt(TotalKM/5);
	partKM = TotalKM / (TotalKM/5);
	}
	else 
	{
	/*** Ajout Thick ligne tous les km ***/
	NbrPart = parseInt(TotalKM/1);
	partKM = TotalKM / (TotalKM/1);
	}
	for (var i = 0; i < NbrPart +1; i++)
	{
		AddLigneVertical(partKM * i,  GraphiqueSVG );	
	}
}


var TextSelected; 
var LastPassage = new Object();
// Numéro du passage trouver pour ce point
var IDPassageFind = 0;


/***** FUNCTION AJOUT DE POINT SUR LES DESSINS ****/
function AddPoint(LastPoint, Point ,mymap , GraphiqueSVG, xStart, xFinish)
{
	// Position de la ligne déniveller 
	posX1 = TransformDistanceEnPxl(LastPoint.KM) + DecalageStartWidth;
	posY1 =	TransformElevationEnPxl(LastPoint.elevation) + DecalageStartHeight;
	posX2 =	TransformDistanceEnPxl(Point.KM) + DecalageStartWidth;
	Posy2 =	TransformElevationEnPxl(Point.elevation) + DecalageStartHeight;
	
	
//	console.log(LastPoint.elevation); 
	
	// AJOUT LIGNE ENTRE POINT PRECEDENT ET POINT SUIVANT  SUR LA CARTE
	var polylinePoints = [
        [LastPoint.Lat, LastPoint.Lon],
        [Point.Lat, Point.Lon]
      ];    
      
	// Couleur ligne parcours
	var color; 
	var r = Math.floor(38);
	var g = Math.floor(ValuePourCent*2.5);
	var b = Math.floor(251);
	if (xStart)
	{
		// Ajout Marker à position trouver
		var greenIcon = new L.Icon({
			iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
			shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41]
		});
		L.marker([Point.Lat, Point.Lon], {icon: greenIcon}).addTo(mymap);
	}
	if (xFinish)
	{
		// Ajout Marker à position trouver
		var greenIcon = new L.Icon({
			iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
			shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41]
		});
		L.marker([Point.Lat, Point.Lon], {icon: greenIcon}).addTo(mymap);
	}
	color= "rgb("+r+" ,"+g+","+ b+")"; 
	var polyline = L.polyline(polylinePoints, {color: color}).addTo(mymap);

//	polyline.getId ('id', 'LineParcours'+ index ); ne fonctionne pas
	polyline.addEventListener('click dblclick', function(e) {
		document.getElementById("Lat").value = LastPoint.Lat ;
	  	document.getElementById("Len").value = LastPoint.Lon;
		document.getElementById("ele").value = LastPoint.elevation;
		document.getElementById("dist").value = LastPoint.KM;
    });
/*
		/******** AJOUT LIGNE BLANCHE POUR MASQUER LE DEGRADER **
	var maLigneMasque = document.createElementNS("http://www.w3.org/2000/svg",'line');	
	maLigneMasque.setAttribute('x1', posX1+ 'px');
    maLigneMasque.setAttribute('y1', posY1 + 'px');
    maLigneMasque.setAttribute('x2', posX2 +'px');
    maLigneMasque.setAttribute('y2', '0px');
    maLigneMasque.setAttribute('stroke','#ffffff');
    maLigneMasque.setAttribute('stroke-width',2);
    maLigneMasque.setAttribute('stroke-linecap','round');
	GraphiqueSVG.appendChild(maLigneMasque);***/
	
	/****** AJOUT LIGNE DU GRAPHIQUE ELEVATION****/
	var maLigne1 = document.createElementNS("http://www.w3.org/2000/svg",'line');
	
	maLigne1.setAttribute('id', 'LineElevation'+ Point.index );
	maLigne1.setAttribute('x1', posX1+ 'px');
	maLigne1.setAttribute('y1', posY1 + 'px');
	maLigne1.setAttribute('x2', posX2 +'px');
	maLigne1.setAttribute('y2', Posy2 +'px');
	maLigne1.setAttribute('stroke','#2680fb');
	maLigne1.setAttribute('stroke-width',3);
	maLigne1.setAttribute('stroke-linecap','round');
	
	GraphiqueSVG.appendChild(maLigne1);
	/* Evénement ligne elevation */
	document.getElementById('LineElevation'+ Point.index).addEventListener('click', function(e) 
	{
		e.currentTarget.setAttribute('stroke', '#ff00cc');
		e.currentTarget.setAttribute('stroke-width', 10);
		document.getElementById("Lat").value = LastPoint.Lat ;
	  	document.getElementById("Len").value = LastPoint.Lon;
		document.getElementById("ele").value = LastPoint.elevation;
		document.getElementById("dist").value = LastPoint.KM;
	});
	
	
}
 
/** FUNCTION DESSINER LA LIGNE DE DISTANCE *************/
function AddLigneVertical( value, GraphiqueSVG )
{
		
	var DistancenPxl = TransformDistanceEnPxl(value) + DecalageStartWidth;
	/*** AFFICHAGE TEXT AU DöBUT DE LA LIGNE *****/
	var HeightLine = Height + DecalageStartHeight;
	var newText = document.createElementNS("http://www.w3.org/2000/svg",'text');
	newText.setAttributeNS(null,"x", (DistancenPxl -10) +'px');     
	newText.setAttributeNS(null,"y", (HeightLine+20) +'px'); 
	newText.setAttributeNS(null,"font-size","12");
	
	var textNode = document.createTextNode(Math.round(value));
	newText.appendChild(textNode);
	GraphiqueSVG.appendChild(newText);


	var maLigne1 = document.createElementNS("http://www.w3.org/2000/svg",'line');
    maLigne1.setAttribute('x1', DistancenPxl + 'px');
    maLigne1.setAttribute('y1', (HeightLine -10) + 'px');
    maLigne1.setAttribute('x2', DistancenPxl + 'px');
    maLigne1.setAttribute('y2',  (HeightLine+10) +'px');
    maLigne1.setAttribute('stroke','#000000');
	maLigne1.setAttribute("style","opacity:0.2");
    maLigne1.setAttribute('stroke-width',1);
    maLigne1.setAttribute('stroke-linecap','round');
	GraphiqueSVG.appendChild(maLigne1);
}
/** FUNCTION DESSINER LA LIGNE   ELEVATION D+ *************/
function AddLigneElevation( value, GraphiqueSVG )
{
		
	var ELevationPxl = TransformElevationEnPxl(value) + DecalageStartHeight;
		/*** AFFICHAGE TEXT AU DöBUT DE LA LIGNE *****/
	var newText = document.createElementNS("http://www.w3.org/2000/svg",'text');
	newText.setAttributeNS(null,"x",'10px');     
	newText.setAttributeNS(null,"y",(ELevationPxl) +'px'); 
	newText.setAttributeNS(null,"font-size","12");
	
	var textNode = document.createTextNode(Math.round(value));
	newText.appendChild(textNode);
	GraphiqueSVG.appendChild(newText);

	var maLigne1 = document.createElementNS("http://www.w3.org/2000/svg",'line');

    maLigne1.setAttribute('x1',  (DecalageStartWidth - 10) +'px');
    maLigne1.setAttribute('y1', ELevationPxl+ 'px');
    maLigne1.setAttribute('x2', (Width + DecalageStartWidth)+'px');
    maLigne1.setAttribute('y2',  ELevationPxl +'px');

    maLigne1.setAttribute('stroke','#000000');
	maLigne1.setAttribute("style","opacity:0.2");
    maLigne1.setAttribute('stroke-width',1);

    maLigne1.setAttribute('stroke-linecap','round');
	GraphiqueSVG.appendChild(maLigne1);
}

function ReadFileCoordonee()
{
	var ArrayPassage = [];
	var Table = document.getElementById("TablePointPassage");
	const reader = new FileReader(); 

    reader.onload = (event) => { 
     const file = event.target.result; 
     const allLines = file.split(/\r\n|\n/); 
     // Reading line by line 
     allLines.map((line) => { 
	 
  
				Table.insertRow(0);
				// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
				var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				var cell3 = row.insertCell(2);
				// Add some text to the new cells:
				cell1.innerHTML = Linesplit[0];
				cell2.innerHTML = Linesplit[1];
				cell3.innerHTML =Linesplit[2];	
				var Passage= new Object();
			var Linesplit =	line.split(";");
					Passage.Nom= Linesplit[0];
					Passage.Lat = Linesplit[1];
					Passage.Lon = Linesplit[2];
					ArrayPassage.push(Passage);
     }); 
    }; 

    reader.onerror = (evt) => { 
     alert(evt.target.error.name); 
    }; 				

}

function copyStylesInline(destinationNode, sourceNode) {
   var containerElements = ["svg","g"];
   for (var cd = 0; cd < destinationNode.childNodes.length; cd++) {
       var child = destinationNode.childNodes[cd];
       if (containerElements.indexOf(child.tagName) != -1) {
            copyStylesInline(child, sourceNode.childNodes[cd]);
            continue;
       }
       var style = sourceNode.childNodes[cd].currentStyle || window.getComputedStyle(sourceNode.childNodes[cd]);
       if (style == "undefined" || style == null) continue;
       for (var st = 0; st < style.length; st++){
            child.style.setProperty(style[st], style.getPropertyValue(style[st]));
       }
   }
}

function triggerDownload (imgURI, fileName) {
  var evt = new MouseEvent("click", {
    view: window,
    bubbles: false,
    cancelable: true
  });
  var a = document.createElement("a");
  a.setAttribute("download", fileName);
  a.setAttribute("href", imgURI);
  a.setAttribute("target", '_blank');
  a.dispatchEvent(evt);
}

function downloadSvg( ) {
	var svg = document.getElementById("image1");
	var fileName = "image1.png";
  var copy = svg.cloneNode(true);
  copyStylesInline(copy, svg);
  var canvas = document.createElement("canvas");
  var bbox = svg.getBBox();
  canvas.width = bbox.width;
  canvas.height = bbox.height;
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, bbox.width, bbox.height);
  var data = (new XMLSerializer()).serializeToString(copy);
  var DOMURL = window.URL || window.webkitURL || window;
  var img = new Image();
  var svgBlob = new Blob([data], {type: "image/svg+xml;charset=utf-8"});
  var url = DOMURL.createObjectURL(svgBlob);
  img.onload = function () {
    ctx.drawImage(img, 0, 0);
    DOMURL.revokeObjectURL(url);
    if (typeof navigator !== "undefined" && navigator.msSaveOrOpenBlob)
    {
        var blob = canvas.msToBlob();         
        navigator.msSaveOrOpenBlob(blob, fileName);
    } 
    else {
        var imgURI = canvas
            .toDataURL("image/png")
            .replace("image/png", "image/octet-stream");
        triggerDownload(imgURI, fileName);
    }
    document.removeChild(canvas);
  };
  img.src = url;
}

</script> 
<!---  ********************************************************
			Affichage de la liste des dossiers  
***************************************************************** --->

 <div  id="TableauResulat">
	<!--- Liste des parcours !---->
	<?php
// Afficher la liste des Parcours  Dossier dans la course ;
$pathfolder = 'defichrono/courses/'.$NOM_COURSE.$ANNEE_COURSE;
// CrÃ©ation de la liste de toutes les Dossier = Parcours 
$files1 = scandir($pathfolder);
// Liste des fichier 
foreach ($files1  as $key => $Parcours) 
{ 
	if(is_dir($pathfolder .'/'.$Parcours))
	{
		// Affichage dans la liste des depart dans le menu 
		if (strlen($Parcours) >2 && $Parcours != "info") 
		{	
			//<!--- Liste des Départ du parcours !---->
			// Afficher la liste des Parcours  Dossier dans la course ;
			$pathfolderParcours = $pathfolder .'/'.$Parcours;
		?>	
		<script>
			// Création d'un parcours
			var Parcours= new Object();	
			Parcours.nom=<?php echo json_encode($Parcours); ?>;
			Parcours.info =  readJSON(<?php echo json_encode($pathfolderParcours); ?>+"/info.json");
			// Ajout d'un tableau de départ au parcours
			var ArrayDepart = [];
		</script>
		<?php

			// CrÃ©ation de la liste de toutes les Dossier = Depart 
			$filesDepart = scandir($pathfolderParcours);
			foreach ($filesDepart  as $key => $depart) 
			{ 
				$posInfo = strpos($depart, 'info.json');
				$pathfolderDepart = $pathfolderParcours .'/'.$depart;

				if(is_dir($pathfolderDepart) && $posInfo == false )
				{?>
				<script>
			
					</script>
					<?
					if (strlen($depart) >2)
					{
					?>
						<script>
							console.log(<?php echo json_encode($pathfolderDepart); ?>);
							var ArrayEtape = [];
							var Depart= new Object();
							Depart.Nom = <?php echo json_encode($depart); ?>;
						
						</script>
						<?php
							// Lecture du fichier info.json 	du départ
							$pathFileInfo = $pathfolderDepart.'/info.json';
							if (file_exists($pathFileInfo))
							{?>
								<script>
								Depart.info =  readJSON(<?php echo json_encode($pathFileInfo); ?>);
							//	console.log(Depart.info );
								</script><?
							}
				
						// CrÃ©ation de la liste de toutes les Dossier = Etape 
						$filesEtape = scandir($pathfolderDepart);

						/***************** Etape ********************/
						$CmptEtape = 1;
						foreach ($filesEtape  as $key => $Etape) 
						{
							$pathFolderEtape = $pathfolderDepart .'/'. $Etape ;
							
							if (strlen($Etape) >2 && is_dir($pathFolderEtape ) && $Etape != "images" && $Etape != "General")
							{
									
								// Lecture du fichier info.txt de l'étape 	
								$pathFileInfoEtape = $pathFolderEtape.'/info.json';
								if (file_exists($pathFileInfoEtape))
								{
									?> <script>
								
								</script>
								<?
									$pathfileImageEtape = $pathFolderEtape.'/images/Etape.jpg';
									if (file_exists ( $pathfileImageEtape ) == false)
									{
										$pathfileImageEtape = "";
									}
									$pathfileGpxEtape = $pathFolderEtape.'/images/Etape.xml';
									if (file_exists ( $pathfileGpxEtape ) == false)
									{
										$pathfileGpxEtape = "";
									}
									$CmptEtape ++;
									?> <script>
									var Etape = new Object();
									Etape.Image = <?php echo json_encode($pathfileImageEtape); ?>;
									Etape.GPX = <?php echo json_encode($pathfileGpxEtape); ?>;
									Etape.Nom = <?php echo json_encode($Etape); ?>;
									Etape.info = readJSON(<?php echo json_encode($pathFileInfoEtape); ?>);
									console.log(Etape.info.ListDiscipline.ListItem);
					
									for (var j = 0; j < Etape.info.ListDiscipline.ListItem.length; j++)
									{
									
										var path = <?php echo json_encode($pathFolderEtape); ?>+'/images/Disc'+(j+1)+'.jpg';
					
											Etape.info.ListDiscipline.ListItem[j].Image = path;
										
									}
									</script>
									<?							
								}
								?>
								<script>
								ArrayEtape.push(Etape);
								</script><?php
							}
						}	
						?>
						<script>
							Depart.ArrayEtape = ArrayEtape;
							ArrayDepart.push(Depart);
						</script><?php					
					}	
		
				}
				
			}?>
			<script>
			Parcours.ArrayDepart =ArrayDepart;
			/********** AJout du parcours au tableau de parcours *********/
			ArrayParcours.push(Parcours);
			console.log(Parcours);
			</script><?
		}
	}
}
?>
<script>
 // crée un nouvel élément div
let b = document.body;
let newDiv = document.createElement("div");
  MenuCourse = document.getElementById("MenuCourse");
  // ********** POUR CHAQUE PARCOURS ***************/
for (var i = 0; i < ArrayParcours.length; i++) 
{

	var ParcoursObj = new Object();
	ParcoursObj = ArrayParcours[i];
	let ParcoursPara  = null ;

	// Si il existe plusieurs parcours
	if (ArrayParcours.length > 1)
	{
		ParcoursPara = document.createElement('fieldset');

		ColMenu = document.createElement('td');
		ColMenu.style.width = 100/ ArrayParcours.length + "%"

		ParcoursMenu = document.createElement('a');
		ParcoursMenu.setAttribute('href', "#div"+ParcoursObj.nom);
		ParcoursMenu.innerHTML = ParcoursObj.nom;
		ParcoursMenu.id =  ParcoursObj.nom;
		ParcoursMenu.style.width = "80%";

	/*	 ImageMenu = document.createElement('img');
		 ImageMenu.src =  "images/Parcours.png";
		 ImageMenu.style.width = "40px"
		 ImageMenu.style.textAlign  ="center";

		ParcoursMenu.append (ImageMenu);*/
		ColMenu.append(ParcoursMenu);

		MenuCourse.append(ColMenu);
	}
	else
	{
		ParcoursPara = document.createElement('div');
	}
		
	ParcoursPara.className='TableauResulat'
	ParcoursPara.classList.add('Anchor');
	ParcoursPara.id = "div"+ParcoursObj.nom;
	let NomParcoursPara =	document.createElement('div');	
		
		// Affichage du titre du parcours si il y a plusieurs départ
	if (ParcoursObj.nom.length > 0 &&  ArrayParcours.length>1 && ParcoursObj.ArrayDepart.length> 1)
	{
	
		NomParcoursPara.textContent = "Parcours : " +ParcoursObj.nom;
		NomParcoursPara.className += "titleCenter";
	
	}
	ParcoursPara.append(NomParcoursPara);


	// ************************Pour chaque départ ***********************
	for (var h = 0; h < ParcoursObj.ArrayDepart.length; h++)
	{
			
		var DepartObj = new Object();
		// Reprise de l'objet départ dans le tableau
		DepartObj = ParcoursObj.ArrayDepart[h];
		
		// Créer un Div par Depart
		let  DepartPara = document.createElement('div');
		console.log(DepartObj);
	
		let NomStartPara =	document.createElement('p');	
		NomStartPara.className += "title";
		
		let TableTitleDepart = document.createElement('table');	
		TableTitleDepart.style.width = "100%";
		TableTitleDepart.style.marginTop = "0px";
		let RowsTitleDepart = document.createElement('tr');
		let ColumnTitleDepart = document.createElement('td');
			
		RowsTitleDepart.append(ColumnTitleDepart);
			
		if (DepartObj.Nom.length > 0)
		{
			ColumnTitleDepart.textContent =  DepartObj.Nom;

			RowsTitleDepart.append(ColumnTitleDepart);
		}
		

		// SI le départ contient 1 étape on va reprendre sont heure de départ
		if (DepartObj.ArrayEtape.length == 1 )
		{
			ColumnTitleDepart = document.createElement('td');
			ColumnTitleDepart.style.width = "20%";
			if (DepartObj.ArrayEtape[0].info.HeureDepart._Value.length > 0)
			{	
			
				ColumnTitleDepart.innerHTML ='<i class="fa fa-clock-o" ></i>' +" " +DepartObj.ArrayEtape[0].info.HeureDepart._Value ;
				ColumnTitleDepart.style.borderBottom ="0px";
			
			}
			RowsTitleDepart.append(ColumnTitleDepart);
	
			ColumnTitleDepart = document.createElement('td');
			ColumnTitleDepart.style.width = "20%";
			if (DepartObj.ArrayEtape[0].info.Distance._Value.length > 0)
			{	
			
				ColumnTitleDepart.innerHTML = DepartObj.ArrayEtape[0].info.Distance._Value ;
				ColumnTitleDepart.style.borderBottom ="0px";
			
			}
			RowsTitleDepart.append(ColumnTitleDepart);

			ColumnTitleDepart = document.createElement('td');
			ColumnTitleDepart.style.width = "20%";
			if (DepartObj.ArrayEtape[0].info.Denivelle._Value.length > 0)
			{	
				ColumnTitleDepart.innerHTML = DepartObj.ArrayEtape[0].info.Denivelle._Value ;
				ColumnTitleDepart.style.borderBottom ="0px";
			}
			RowsTitleDepart.append(ColumnTitleDepart);

			ColTitleEtape =	document.createElement('td');
			ColumnTitleDepart.style.width = "20%";
			// Ajout ligne download fichier gpx présent 
			if ( DepartObj.ArrayEtape[0].GPX.length > 0)
			{
				ColTitleEtape.innerHTML ='<a href="'+DepartObj.ArrayEtape[0].GPX+'" download="'+DepartObj.Nom+'.gpx"  ><i class="fa fa-download"  > .gpx</i></a>';
				ColTitleEtape.style.borderBottom ="0px";
			}
			RowsTitleDepart.append(ColTitleEtape);
		}

		if(DepartObj.info.ListCategorie != null && DepartObj.info.ListCategorie.ListItem.length==1)
		{
			Categorie = DepartObj.info.ListCategorie.ListItem[0];
			// Sexe
			ColumnTitleDepart = document.createElement('td');
			if (Categorie.SexeCategorie._Value =="H")
			{
				ColumnTitleDepart.style.fontSize ="25px";
				ColumnTitleDepart.innerHTML = '<i class="fa fa-male" ></i>';
			}
			else if (Categorie.SexeCategorie._Value  =="D")
			{
				ColumnTitleDepart.style.fontSize ="25px";
				ColumnTitleDepart.innerHTML = '<i class="fa fa-female" ></i>' ;
			}
			else
			{
				ColumnTitleDepart.style.fontSize ="25px";
				ColumnTitleDepart.innerHTML ='<i class="fa fa-female" >' + '<i class="fa fa-male" ></i>' ;
			}

			ColumnTitleDepart.style.borderBottom ="0px";
			RowsTitleDepart.append(ColumnTitleDepart);
			
			// AnneeStart
			ColumnTitleDepart = document.createElement('td');
			if (Categorie.debutAnneeInternet._Value.length > 0)
			{
			ColumnTitleDepart.innerHTML = Categorie.debutAnneeInternet._Value+ " - " + Categorie.finAnneeInternet._Value;
			}
			else
			{
				ColumnTitleDepart.innerHTML = Categorie.debutAnnee._Value+ " - " + Categorie.finAnnee._Value;	
			}
			ColumnTitleDepart.style.borderBottom ="0px";
			RowsTitleDepart.append(ColumnTitleDepart);
			
		}

		TableTitleDepart.append(RowsTitleDepart);
		NomStartPara.append(TableTitleDepart);
		DepartPara.append(NomStartPara);

		for (var j = 0; j < DepartObj.ArrayEtape.length; j++)
		{
			
			EtapeObj1 = DepartObj.ArrayEtape[j];

		 
			let Etapepara = document.createElement('fieldset');
			
			if (DepartObj.ArrayEtape.length > 1)
			{
				let TableTitleEtape = document.createElement('table');			
				TableTitleEtape.style.width = "100%";
				TableTitleEtape.style.borderStyle = "none";
				TableTitleEtape.style.borderSpacing  = "0px";
				TableTitleEtape.style.marginTop  = "15px";
				TableTitleEtape.style.marginBottom  = "15px";
				TableTitleEtape.style.padding  = "10px";

				let RowsTitleEtape =	document.createElement('tr');
				TableTitleEtape.style.background  = "#58b8e7";
				RowsTitleEtape.style.margin  = "10px";
			
				let ColTitleEtape =	document.createElement('td');
				ColTitleEtape.innerHTML ="Etape " +(j +1);
				ColTitleEtape.style.borderBottom ="0px";
				RowsTitleEtape.append(ColTitleEtape);
			
				ColTitleEtape =	document.createElement('td');
				if (EtapeObj1.info.Date != null && EtapeObj1.info.Date._Value.length > 0)
				{
					ColTitleEtape.innerHTML ='<i class="fa fa-calendar-o" ></i>' +" "+ EtapeObj1.info.Date._Value;
					ColTitleEtape.style.borderBottom ="0px";
				}
				RowsTitleEtape.append(ColTitleEtape);

				ColTitleEtape =	document.createElement('td');
				if (EtapeObj1.info.Lieu != null && EtapeObj1.info.Lieu._Value.length > 0)
				{
					ColTitleEtape.innerHTML ='<i class="fa fa-map-marker" ></i>' +" "+EtapeObj1.info.Lieu._Value;
					ColTitleEtape.style.borderBottom ="0px";
				}
				RowsTitleEtape.append(ColTitleEtape);

				ColTitleEtape =	document.createElement('td');
				if (EtapeObj1.info.HeureDepart != null &&  EtapeObj1.info.HeureDepart._Value.length > 0)
				{
					ColTitleEtape.innerHTML ='<i class="fa fa-clock-o" ></i>' +" " +EtapeObj1.info.HeureDepart._Value ;
					ColTitleEtape.style.borderBottom ="0px";
				}
				RowsTitleEtape.append(ColTitleEtape);

				ColTitleEtape =	document.createElement('td');
				// Ajout ligne download fichier gpx présent 
				if ( EtapeObj1.GPX != null && EtapeObj1.GPX.length > 0)
				{
					ColTitleEtape.innerHTML ='<a href="'+EtapeObj1.GPX+'" download="'+EtapeObj1.Nom+'.gpx"  ><i class="fa fa-download"  > .gpx</i></a>';
					ColTitleEtape.style.borderBottom ="0px";
				}
				RowsTitleEtape.append(ColTitleEtape);

				TableTitleEtape.append(RowsTitleEtape);
				DepartPara.append(TableTitleEtape);	
				
				if (EtapeObj1.info.Distance._Value.length > 0 ||   EtapeObj1.Image.length > 0||   EtapeObj1.GPX.length > 0)
				{$
					/* AFFICHAGE INFORMATION PARCOURS ETAPE *************/
					let TableEtape = document.createElement('table');			
					TableEtape.width = "100%";
					let RowsTableEtape =	document.createElement('tr');
					let TableDistance = document.createElement('table');
					let ColInfoEtape =	document.createElement('td');
					if (EtapeObj1.info.Distance._Value.length > 0)
					{
					
						ColInfoEtape.style.width = "20%";
						
						ColInfoEtape.style.verticalAlign ="Top";
						
						TableDistance.style.borderSpacing  = "10px";
						TableDistance.style.width = "100%";					
						let RowsDistance =	document.createElement('tr');
						RowsDistance.style.background  = "#58b8e7"
						
						let ColDistance =	document.createElement('td');
						ColDistance.innerHTML = EtapeObj1.info.Distance._Value  ;
						ColDistance.style.padding ="10px";
						
						RowsDistance.append(ColDistance);
						TableDistance.append(RowsDistance);
					}
					if (EtapeObj1.info.Denivelle._Value.length > 0)
					{
						RowsDistance =	document.createElement('tr');
						RowsDistance.style.background  = "#58b8e7"
						
						ColDistance =	document.createElement('td');
						RowsDistance.style.width = "100%";	
						ColDistance.style.width = "100%";	
						ColDistance.innerHTML =  EtapeObj1.info.Denivelle._Value ;
						ColDistance.style.padding ="10px";
					
						RowsDistance.append(ColDistance);
						TableDistance.append(RowsDistance);
						ColInfoEtape.append(TableDistance);
						RowsTableEtape.append(ColInfoEtape);
					
					}
					if ( EtapeObj1.Image.length > 0)
					{
			
						let ColimgEtapePara =	document.createElement('td');
						ColimgEtapePara.width = "80%";
						let ImageEtape = document.createElement('img');
						ImageEtape.src =  EtapeObj1.info.Image;
						ImageEtape.className += "imgCenter";
						ImageEtape.style.width = "80%"
						ImageEtape.style.textAlign  ="center";
						ColimgEtapePara.append(ImageEtape);
						RowsTableEtape.append(ColimgEtapePara);
					}
					if ( EtapeObj1.GPX.length > 0)
					{

						let ColimgEtapePara =	document.createElement('div');
						

						ColimgEtapePara.width = "80%";
					/*	let ImageEtape = document.createElement('img');
						ImageEtape.src =  EtapeObj.Image;
						ImageEtape.className += "imgCenter";
						ImageEtape.style.width = "80%"
						ImageEtape.style.textAlign  ="center";
						ColimgEtapePara.append(ImageEtape);*/
						RowsTableEtape.append(ColimgEtapePara);
						//mapSvg("Etape " +(j +1)+DepartObj.Nom, EtapeObj.GPX, ColimgEtapePara);

						mapSvg(DepartObj.Nom + EtapeObj1.Nom, EtapeObj1.GPX, ColimgEtapePara);
					}								
				TableEtape.append(RowsTableEtape);			
				DepartPara.append(TableEtape);
				}
			
			}
			else // Affichage imges si il y a une seul étape
			{
				let TableEtape = document.createElement('table');			
				TableEtape.width = "100%";
				DepartPara.append(TableEtape);

				if ( EtapeObj1.Image.length > 0)
				{
				
					let RowsTableEtape =	document.createElement('tr');
					let ColimgEtapePara =	document.createElement('td');
					ColimgEtapePara.width = "80%";
					let ImageEtape = document.createElement('img');
					ImageEtape.src =  EtapeObj1.Image;
					ImageEtape.className += "imgCenter";
					ImageEtape.style.width = "80%"
					ImageEtape.style.textAlign  ="center";
					ColimgEtapePara.append(ImageEtape);
					RowsTableEtape.append(ColimgEtapePara);
					TableEtape.append(RowsTableEtape);			
				
					
				}
				if ( EtapeObj1.GPX.length > 0)
				{

					let RowsTableEtape1 =	document.createElement('tr');
					let ColimgEtapePara1 =	document.createElement('td');
					let DivimgEtapePara =	document.createElement('div');

					ColimgEtapePara1.width = "80%";
					ColimgEtapePara1.append(DivimgEtapePara);
					RowsTableEtape1.append(ColimgEtapePara1);
					TableEtape.append(RowsTableEtape1);
				//	mapSvg("Etape " +(j +1)+EtapeObj1.info.Nom._Value, EtapeObj1.GPX, DivimgEtapePara);
					mapSvg(DepartObj.Nom + EtapeObj1.Nom, EtapeObj1.GPX, DivimgEtapePara);
				}	
			}						
			
		
			//********************* Discpline *****************/
			if (EtapeObj1.info.ListDiscipline != null && EtapeObj1.info.ListDiscipline.ListItem.length > 1)
			{
				
				for (var d = 0; d < EtapeObj1.info.ListDiscipline.ListItem.length; d++)
				{
					var	DisciplineObj =  new Object();
					DisciplineObj = EtapeObj1.info.ListDiscipline.ListItem[d];
					// Si plus de 1 discipline afficher celle-ci en en tête
					if (DisciplineObj.Nom._Value.length > 0 )
					{
						let NomPara =	document.createElement('div');
						
						NomPara.textContent =  DisciplineObj.Nom._Value;
						NomPara.className += "title";
						DepartPara.append(NomPara);

					
			
					// ************  AFFICHAGE INFORMATION Discipline  ************

						let TableDisc = document.createElement('table');			
						TableDisc.width = "100%";
						
						let TableInfoDisc = document.createElement('table');
							TableInfoDisc.style.borderSpacing  = "10px";
							TableInfoDisc.style.width = "100%";	
						let ColInfoDisc =	document.createElement('td');
						ColInfoDisc.style.width = "20%";
						if (DisciplineObj.Distance._Value.length > 0)
						{
							ColInfoDisc.style.verticalAlign ="Top";
							let RowsDiscDistance =	document.createElement('tr');
							RowsDiscDistance.style.background  = "#58b8e7"
							
							let ColInfoDistance =	document.createElement('td');
							ColInfoDistance.innerHTML = DisciplineObj.Distance._Value  ;
							ColInfoDistance.style.padding ="10px";
							
							RowsDiscDistance.append(ColInfoDistance);
							TableInfoDisc.append(RowsDiscDistance);
						}
						if (DisciplineObj.Denivelle._Value.length > 0)
						{
							RowsDiscDistance =	document.createElement('tr');
							RowsDiscDistance.style.background  = "#58b8e7"
							
							ColInfoDistance =	document.createElement('td');
							RowsDiscDistance.style.width = "100%";	
							ColInfoDistance.style.width = "100%";	
							ColInfoDistance.innerHTML =  DisciplineObj.Denivelle._Value ;
							ColInfoDistance.style.padding ="10px";
							RowsDiscDistance.append(ColInfoDistance);
							
							TableInfoDisc.append(RowsDiscDistance);
						}

							ColInfoDisc.append(TableInfoDisc);
							//RowsTableDisc.append(ColInfoDisc);

						if ( DisciplineObj.Image != null && DisciplineObj.Image.length > 0)
						{
							let RowsTableDisc =	document.createElement('tr');
							let ColimgDiscPara =	document.createElement('td');
							ColimgDiscPara.width = "80%";
							let ImageDisc = document.createElement('img');
							ImageDisc.src =  DisciplineObj.Image;
							ImageDisc.className += "imgCenter";
							ImageDisc.style.width = "80%"
							ImageDisc.style.textAlign  ="center";
						//	ColimgDiscPara.append(ImageDisc);
							RowsTableDisc.append(ColimgDiscPara);
							TableDisc.append(RowsTableDisc);	
						}

						if (DisciplineObj.GPX != null &&   DisciplineObj.GPX.length > 0)
						{
							let RowsTableDisc1 =	document.createElement('tr');
							let ColimgDiscPara1 =	document.createElement('td');
							ColimgDiscPara1.width = "80%";
							let DivDisc = document.createElement('div');
							DivDisc.style.width = "80%"
							DivDisc.style.textAlign  ="center";
							mapSvg("Disc" +(d +1)+DepartObj.info.Nom._Value, EtapeObj.GPX, DivDisc);
							ColimgDiscPara1.append(DivDisc);
							RowsTableDisc1.append(ColimgDiscPara1);
							TableDisc.append(RowsTableDisc1);	
						}	

						DepartPara.append(TableDisc);
					}			
				}
		
			}
		}
			/*************** Catégorie *********************/
			if (DepartObj.info.ListCategorie != null && DepartObj.info.ListCategorie.ListItem.length > 1) 	
			{
						//***************** Titre du tableau de catégorie  ****************
				let ZoneTaifStartPara1 =	document.createElement('p');	
			
				
			
				
				let TableCat =	document.createElement('table');
				TableCat.id = "TableauCat";
				TableCat.width = "100%";

				let RowsTableCat =	document.createElement('tr');
				let HeaderTableCat =	document.createElement('th');
				
				HeaderTableCat.textContent = "N°";	
				RowsTableCat.append(HeaderTableCat);
				HeaderTableCat =	document.createElement('th');
				HeaderTableCat.textContent = "Nom Catégorie";	
		
				RowsTableCat.append(HeaderTableCat);
				HeaderTableCat =	document.createElement('th');
				HeaderTableCat.textContent = "Sexe";	
				RowsTableCat.append(HeaderTableCat);
		
				HeaderTableCat =	document.createElement('th');
				HeaderTableCat.textContent = "Année de naissance";	
				RowsTableCat.append(HeaderTableCat);
				HeaderTableCat =	document.createElement('th');
				HeaderTableCat.textContent = "";	
				RowsTableCat.append(HeaderTableCat);
				TableCat.append(RowsTableCat);
				for (var d = 0; d < DepartObj.info.ListCategorie.ListItem.length; d++)
				{
					var CatObj = DepartObj.info.ListCategorie.ListItem[d];
					let RowsTableCat =	document.createElement('tr');
				
					HeaderTableCat =	document.createElement('td');
					HeaderTableCat.textContent = CatObj.NumCategorie._Value ;	
					RowsTableCat.append(HeaderTableCat);
					HeaderTableCat =	document.createElement('td');
					HeaderTableCat.textContent = CatObj.NomCategorie._Value ;	
					RowsTableCat.append(HeaderTableCat);
					HeaderTableCat =	document.createElement('td');

					if (CatObj.SexeCategorie._Value=="H")
					{
						HeaderTableCat.style.fontSize ="25px";
						HeaderTableCat.innerHTML = '<i class="fa fa-male" ></i>';
					}
					else if (CatObj.SexeCategorie._Value =="D")
					{
						HeaderTableCat.style.fontSize ="25px";
						HeaderTableCat.innerHTML = '<i class="fa fa-female" ></i>' ;
					}
					else
					{
						HeaderTableCat.style.fontSize ="25px";
						HeaderTableCat.innerHTML ='<i class="fa fa-female" >' + '<i class="fa fa-male" ></i>' ;
					}
				
					RowsTableCat.append(HeaderTableCat);
					HeaderTableCat =	document.createElement('td');
					if (CatObj.debutAnneeInternet._Value.length > 1)
					{
						HeaderTableCat.textContent = CatObj.debutAnneeInternet._Value ;	
					}
					else
					{
						HeaderTableCat.textContent = CatObj.debutAnnee._Value ;	
					}
					RowsTableCat.append(HeaderTableCat);
					HeaderTableCat =	document.createElement('td');
					if (CatObj.finAnneeInternet._Value.length > 1)
					{
						HeaderTableCat.textContent = CatObj.finAnneeInternet._Value ;	
					}
					else
					{
						HeaderTableCat.textContent = CatObj.finAnnee._Value ;	
					}	
					RowsTableCat.append(HeaderTableCat);
					TableCat.append(RowsTableCat);
				}
				ZoneTaifStartPara1.textContent = "Catégories : ";
				DepartPara.append(ZoneTaifStartPara1);
				DepartPara.append(TableCat);

			
			}
			ParcoursPara.append(DepartPara);
		
		
		
	}

	// ************* ARRAY TARIFS ************************
	if (ParcoursObj.info.ListTariffZone != null && ParcoursObj.info.ListTariffZone.ListItem.length > 0 )
	{
		//***************** Titre de la zone de tarif ****************
		let ZoneTaifStartPara =	document.createElement('p');	
		ZoneTaifStartPara.className += "title";
		ZoneTaifStartPara.textContent = "Tarifs du parcours :  " + ParcoursObj.nom;
		ParcoursPara.append(ZoneTaifStartPara);
	
		var	ZoneTarifsObj =  new Object();
		ZoneTarifsObj = ParcoursObj.info.ListTariffZone.ListItem[0];
		let TableZoneTarif = document.createElement('table');			
		TableZoneTarif.id = "TableauTarif";
		TableZoneTarif.width = "100%";

		let RowsTableTarif =	document.createElement('tr');
		let HeaderTableTarif =	document.createElement('th');
	
		if (ZoneTarifsObj.Nom != null && ZoneTarifsObj.Nom._Value.length > 0)
		{
			HeaderTableTarif.textContent = "Type de paiement";
			RowsTableTarif.append(HeaderTableTarif);
		}
		if (ZoneTarifsObj.dateEndZone != null && ZoneTarifsObj.dateEndZone._Value.length > 0)
		{
			HeaderTableTarif =	document.createElement('th');
			HeaderTableTarif.textContent = "Limite zone";	
			RowsTableTarif.append(HeaderTableTarif);
		}
		// Affichage des options de paiement dans l en tete
		if (ZoneTarifsObj.ListTarif != null && ZoneTarifsObj.ListTarif.length > 1 && ZoneTarifsObj.ListTarif.length < 6 )
		{
			for (var f = 0; f < ZoneTarifsObj.ListTarif.length; f++)
			{
				var	TarifsObj =  new Object();
				TarifsObj = ZoneTarifsObj.ListTarif[f];
				
				if (TarifsObj != undefined && TarifsObj.NomOption._Value != null && TarifsObj.NomOption._Value.length > 0)
				{
					HeaderTableTarif =	document.createElement('th');
					HeaderTableTarif.textContent = TarifsObj.NomOption._Value ;
					RowsTableTarif.append(HeaderTableTarif);
				}
			}
		}
		//*********** CONTENU DU TABLEAU TARIFS****************************
			
		for (var p= 0; p < ParcoursObj.info.ListTariffZone.ListItem.length; p++)
		{
			ZoneTarifsObj = ParcoursObj.info.ListTariffZone.ListItem[p];
			TableZoneTarif.append(RowsTableTarif);
			RowsTableTarif =	document.createElement('tr');
			if ( ZoneTarifsObj.NomZone != null && ZoneTarifsObj.NomZone._Value.length > 0)
			{
				HeaderTableTarif =	document.createElement('td');
				HeaderTableTarif.textContent = ZoneTarifsObj.NomZone._Value;	
				RowsTableTarif.append(HeaderTableTarif);
			}
			
			if ( ZoneTarifsObj.dateEndZone != null &&  ZoneTarifsObj.dateEndZone._Value.length > 0)
			{
				HeaderTableTarif =	document.createElement('td');

				if ( !isNaN(ZoneTarifsObj.MaximumInscription._Value) &&  ZoneTarifsObj.MaximumInscription._Value > 0 )
				{
					HeaderTableTarif.textContent ="< "+ ZoneTarifsObj.MaximumInscription._Value+ " athlètes";							
				}
				else
				{
					HeaderTableTarif.textContent = ZoneTarifsObj.dateEndZone._Value;
				}						
				RowsTableTarif.append(HeaderTableTarif);
			}
			// Affichage des options de paiement dans l en tete

			if (ZoneTarifsObj.ListTarif.length > 0 && ZoneTarifsObj.ListTarif.length < 6 )
			{
				for (var e = 0; e < ZoneTarifsObj.ListTarif.length; e++)
				{
					var	TarifsObj =  new Object();
					TarifsObj = ZoneTarifsObj.ListTarif[e];
					
					if ( TarifsObj != null && TarifsObj.NomOption._Value.length > 0)
					{
						HeaderTableTarif =	document.createElement('td');
						HeaderTableTarif.textContent = TarifsObj.tarif._Value + " CHF";
						RowsTableTarif.append(HeaderTableTarif);
					
					
					}
					
				}
			}
			TableZoneTarif.append(RowsTableTarif);
		
		}
		ParcoursPara.append(TableZoneTarif);
	}
		newDiv.append(ParcoursPara);
		//	ParcoursPara.append(TableCat);
	
		
	
}
	
	
newDiv.id = "Information";
b.append(newDiv);

/************************** Apres crétion du DOm obligatoire pour fichier gpx ****************/
for (var i = 0; i < ArrayParcours.length; i++) 
{
	for (var h = 0; h < ArrayParcours[i].ArrayDepart.length; h++)
	{
		if ( ArrayParcours[i].ArrayDepart[h].ArrayEtape!= null)
		{
			for (var j = 0; j < ArrayParcours[i].ArrayDepart[h].ArrayEtape.length; j++)
			{
				if ( ArrayParcours[i].ArrayDepart[h].ArrayEtape[j].GPX.length > 0)
				{
				
					AddSvg(ArrayParcours[i].ArrayDepart[h].Nom +  ArrayParcours[i].ArrayDepart[h].ArrayEtape[j].Nom, ArrayParcours[i].ArrayDepart[h].ArrayEtape[j].GPX);
				}
			}
			if ( ArrayParcours[i].ArrayDepart[h].ArrayDiscipline != null)
			{
				for (var z = 0; z < ArrayParcours[i].ArrayDepart[h].ArrayDiscipline.ListItem.length; z++)
				{
					if ( ArrayParcours[i].ArrayDepart[h].ArrayDiscipline[z].GPX.length > 0)
					{
						AddSvg("Disc" +(z +1)+ArrayParcours[i].ArrayDepart[h].Nom, ArrayParcours[i].ArrayDepart[h].ArrayDiscipline[z].GPX);
					}
				}
			}
		}
	}
}

/*** Obtenir position de base des élément */

	for (var i = 0; i < ArrayParcours.length; i++) 
	{
		// Obtenir la position de chaque element 
		var mon_element = document.getElementById("div"+ArrayParcours[i].nom);
		console.log(ArrayParcours[i].nom);
		var positions = mon_element.getBoundingClientRect();
		console.log(positions.top);
		ArrayParcours[i].PositionTop = positions.top-300;
		// selon sa position definir la couleur
		if ( document.documentElement.scrollTop >= positions.top ) {
			mon_element.classList.add("nav-colored");
			mon_element.classList.remove("nav-transparent");
		} 
		else {
			mon_element.classList.add("nav-transparent");
			mon_element.classList.remove("nav-colored");
		}
	}
	ColorMenuParcours();
</script>
</div>
</div>


<script>


var myNav = document.getElementById('Menu1');
window.onscroll = function () { 
	ColorMenuParcours();
	
	
 
};


</script>

</script>
 <?php include ("sponsors.php"); ?>
 
 </div>
<?php include ("footer.php"); ?>

</div>
</body>
</html>

