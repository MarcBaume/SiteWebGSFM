<?php
  include("Header2021.php"); 
  /*************************** CONNECTION AVEC LA BASE DE DONNEES ***********************************/
  $con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
   if (!$con)
  {
		die('Could not connect: ' . mysql_error());
  }
  else
  {
		mysqli_select_db($con ,'dxvv_jurachrono' );
	}
?>
<!-- Import Leaflet CSS Style Sheet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<!-- Import Leaflet JS Library -->
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="../js/prototype.js" >
</script>
<script>
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
</script>
   <body>

<p>

	<H3 style="padding : 30px"> Carte et Profil </H3> <br>
	<p style="padding : 30px">
	<i>Astuce : Pour  le texte d'un lieu sur le graphique, sélectionne le et utilise les touches directionnelles de ton clavier </i></br>
Quand un texte est déplacé appuie sur le bouton "sauvegarder les modifications" pour obtenir le même résultat lors du prochain chargement. /!\ il va enregistrer seulement la dernière modification.
	
	</p>
</div>
<table  id="ImageMap"width=100%>
	<tr>
		<td style="height:400px;">
			<div id="my_osm_widget_map" style="height:400px;">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			 <div  id="conteneurSVG">
			</div>
		</td>
	</tr>
</table>
</p>

<div>

<br><br>
<Center>
<Table width = "80%" >
	<tr>
		<td   width = "15%">
			Total distance :
		</td>
		<td width = "15%">
			<p id="TotalKM"> </p>
		</td>
		<td>
		</td>
		<td width = "15%">
			Total D+ :
		</td>
		<td width = "15%">
			<p id="ELevationTotal"> </p>
		</td>
			<td width = "15%">
			Total D- :
		</td>
		<td width = "15%">
			<p id="DiminutionTotal"> </p>
		</td>
	</tr>
	<tr>
		<td width = "15%">
			Elevation Min : 
		</td>
		<td width = "15%">
			<p id="ElevationMin"> </p>
		</td>
		<td>
		</td>
		<td width = "15%">
			Elevation Max : 
		</td>
		<td width = "15%">
			<p id="ElevationMax"> </p>
		</td>
	</tr>
</table>

		
			<form id="formOffset" action="SaveCoordonnee.php" >
	<!--	 <label for="ModifNom">Nom:</label>-->
		  <input type="hidden" id="ModifNom" style="visibility: collapse;" name="ModifNom">
	<!--	   <label for="PositionX">Start position X:</label>-->
		  <input type="hidden" id="PositionX" style="visibility: collapse;" name="PositionX" readonly="true">
	<!--	  <label for="PositionY">Start position Y:</label>-->
		  <input type="hidden" id="PositionY" style="visibility: collapse;"name="PositionY" readonly="true">
	<!--	  <label for="ModifOffsetX">Offset X:</label>-->
		  <input type="hidden" id="ModifOffsetX" style="visibility: collapse;"name="ModifOffsetX" readonly="true">
	<!--	  <label for="ModifOffsetY">Offset Y:</label>-->
		  <input type="hidden" id="ModifOffsetY" style="visibility: collapse;" name="ModifOffsetY" readonly="true">
			<input type="button" value="Sauvegarder les modifications" style="height : 40px;" onClick="ChangOffsetText()" /> </br>
		</form>

</center>
<!-- Table des différent point de passage -->
<p> <i>Astuce : Sélectionne une ligne et regarde le tronçon choisie sur le profil. </i></p>
 <div  id="TableauResulat">
 <Center>

	<Table id="TablePointPassage"  width = "80%" style="border:1px solid #d3d3d3;">
		<Tr> <!-- Titre -->
			<th>
			</th>
			<th>
			</th>
			<Th>
				Départ
			</th>
			<Th>
				Arrivée
			</th>
			<Th>
				Longueur
			</th>
			<Th>
				Dénivellé positif
			</th>
			<Th>
				Dénivellé négatif
			</th>
			<Th>
				Distance Total
			</th>
			<Th>
				Heure départ estimé
			</th>
			<Th>
				Temps estimé
			</th>
		</Tr>
		<!-- Ajout des lignes depuis le javascript -->
	</Table>
	</center>
</div>
</br>	
<p>
<h3 > Ajout d'un point sur la carte et sur le profil </h3>
	<i>Astuce : Sélectionne l'endroit sur la carte ou sur le profil et remplie le formulaire ci-dessous </i></p>
	 <div  id="formulaire">
 <div  id="TableauResulat">
	<form action="writeCoordonnee.php" method="post">
		 <label for="fname">Nom:</label>
		  <input type="text" id="Nom" name="fNom"><br><br>
		  <label for="fname">Lattidue:</label>
		  <input type="text" id="Lat" name="fLat" readonly="true"><br><br>
		  <label for="lname">Longitude:</label>
		  <input type="text" id="Len" name="fLon" readonly="true"><br><br>
		  <label for="lname">D+:</label>
		  <input type="text" id="ele" name="fele" readonly="true"><br><br>
		  <label for="lname">D-:</label>
		  <input type="text" id="dim" name="fele" readonly="true"><br><br>
		  <label for="lname">Distance:</label>
		  <input type="text" id="dist" name="fdist" readonly="true"><br><br>
		  <input type="submit" value="Submit">
	</form>
</div>
</div>
 <script>
 /******************* Lecture fichier coordonnée *************************/
	
	var ArrayPassage = [];
	var Table = document.getElementById("TablePointPassage");
	var Counter = 0;
/******************* Lecture fichier coordonnée *************************/
</script>
 
	<?
// Lecture du fichier info.txt 	
	$pathFileInfo = 'File/coordonnee.txt';
	if (file_exists($pathFileInfo))
	{
		if (($handle = fopen($pathFileInfo, "r")) !== FALSE) 
		{
			$cmpt =0;
	
	
			while (($datatxt = fgetcsv($handle, 1000, ";")) !== FALSE) 
			{?>
				<script>
				Counter++;
				
				var Passage= new Object();
					Passage.ID = Counter;
					Passage.Nom= <?php echo json_encode($datatxt[0]); ?>;
					Passage.Lat = <?php echo json_encode($datatxt[1]); ?>;
					Passage.Lon = <?php echo json_encode($datatxt[2]); ?>;
							var offX = <?php echo json_encode($datatxt[3]); ?>;			
					var offY = <?php echo json_encode($datatxt[4]); ?>;

					
					if (offY != null&& offY.length > 0)
					{
						Passage.OffsetTextY = parseFloat(offY);
					}
					else
					{
						Passage.OffsetTextY = 0;
					}
					if (offX != null && offX.length > 0)
					{
						Passage.OffsetTextX = parseFloat(offX);
					}
					else
					{
						Passage.OffsetTextX = 0;
					}
				
					Passage.checked = false;
					Passage.OnTab = false;
					console.log("offset:" +Passage.OffsetTextX );
					Passage.PosTextX = 0;
					Passage.PosTextY = 0;
					ArrayPassage.push(Passage);
					 
				</script><?
		
			}
		}
	}
				
	?>
	   <script>
	 

	var Width  = 1300;//133 screen.width -200; // 1300
	var Height = (Width /100) *18;
	var DecalageStartWidth = 50; // Valeur de décalage du commencement du graphique en horizontal
var DecalageStartHeight = 50; // Valeur de décalage du commencement du graphique en vertical
var indexPassage = 1;


/*_________________________________________________________________


				EVENEMENT SI  LORS DE L'UTILISATION DES TOUCHES DIRECTIONNEL DU CLAVIER 
				
				Déplacement du text sur le graphique élevation
________________________________________________________________________**/

		document.addEventListener("keydown", event => {
		// UP
  if (event.isComposing || event.keyCode === 38)
  {

	if (TextSelected != null)
	{
		posy =	TextSelected.getAttributeNS( null, 'y' );
		console.log(TextSelected.getAttribute('id'));
		// Déplacement du text 
		TextSelected.setAttributeNS(null,'y',parseFloat(posy)-10);

		var idPassage = TextSelected.getAttribute('id').substring(9);
		console.log(idPassage);
		
		// Valeur position zéro du text
		var ValuePosBase =	parseFloat(document.getElementById("PositionY").value);
		// Calcul offset par rapport à la position zéro
		document.getElementById("ModifOffsetY").value = (ValuePosBase -(parseFloat(posy)-10))*-1;
		
	 }
	 else
	 {
	 alert("Sélectionner un texte du graphique");
	 }
  }
  // Left
  else   if (event.isComposing || event.keyCode === 37) {
	if (TextSelected != null)
	{
		posy =	TextSelected.getAttributeNS( null, 'x' );
		TextSelected.setAttributeNS(null,'x',parseFloat(posy)-10);
		
		// Valeur position zéro du text
		var ValuePosBase =	parseFloat(document.getElementById("PositionX").value);
		// Calcul offset par rapport à la position zéro
		document.getElementById("ModifOffsetX").value = (ValuePosBase -(parseFloat(posy)-10))*-1;
	 }
	 else
	 {
	 alert("Sélectionner un texte du graphique");
	 }

  }
  // Down
else   if (event.isComposing || event.keyCode === 40) {
	if (TextSelected != null)
	{
		posy =	TextSelected.getAttributeNS( null, 'y' );
		TextSelected.setAttributeNS(null,'y',parseFloat(posy)+10);
		// Valeur position zéro du text
		var ValuePosBase =	parseFloat(document.getElementById("PositionY").value);
		// Calcul offset par rapport à la position zéro
		document.getElementById("ModifOffsetY").value = (ValuePosBase-(parseFloat(posy)+10))*-1;
	 }
	 else
	 {
		alert("Sélectionner un texte du graphique");
	 }
  }
  // Right
    else   if (event.isComposing || event.keyCode === 39) {
	if (TextSelected != null)
	{
		posy =	TextSelected.getAttributeNS( null, 'x' );
		TextSelected.setAttributeNS(null,'x',parseFloat(posy)+10);
		// Valeur position zéro du text
		var ValuePosBase =	parseFloat(document.getElementById("PositionX").value);
		// Calcul offset par rapport à la position zéro
		document.getElementById("ModifOffsetX").value = (ValuePosBase -(parseFloat(posy)+10))*-1;
	 }
	 else
	 {
		alert("Sélectionner un texte du graphique");
	 }
  }
});


/******************* SVG ***********************
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

c.height = 300;
**/
/*** CREATION DE L?ARRIüRE PLAN DEGRADER 
var grd = ctx.createLinearGradient(0, 750, 0, 0);
grd.addColorStop(0, "#2680fb");
grd.addColorStop(1, "white");

ctx.fillStyle = grd;
ctx.fillRect(DecalageStartWidth, DecalageStartHeight, Width, Height );

***/
/*** ZONE DE DESSIN **/
 var GraphiqueSVG = document.createElementNS("http://www.w3.org/2000/svg",'svg');

    GraphiqueSVG.style.width = (Width + (DecalageStartWidth*2) ) +'px';
    GraphiqueSVG.style.height = (Height + (DecalageStartHeight*2))+'px';
    GraphiqueSVG.id = 'image1';
   // GraphiqueSVG.style.position = 'absolute';
  //  GraphiqueSVG.style.top = '50px';
//	GraphiqueSVG.style.Right = '50px';

	var conteneur = document.getElementById("conteneurSVG");
    conteneur.style.height = (Height + (DecalageStartHeight*2))+'px';
    conteneur.appendChild(GraphiqueSVG);

	
/***************************************** READ FCIHIER GPX *******************************************
*																															*
*																															*
*																															*
*																															*
****************************************************************************************************/	


 // Create a connection to the file.
  var Connect = new XMLHttpRequest();
  // Define which file to open and
  // send the request.
  Connect.open("GET", "Parcours2021.xml", false);
  Connect.setRequestHeader("Content-Type", "text/xml");
  Connect.send(null);
  // Place the response in an XML document.
  var TheDocument = Connect.responseXML;
  // Place the root node in an element.
  var Customers = TheDocument.childNodes[0];

  // Retrieve each customer in turn.
	var LastPoint = null;
	var TotalKM = 0;
	var TotalDiminution = 0;
	var TotalELevation = 0;
	var StartElevation = 0;
	var ElevationMin = 10000;
	var ElevationMax = 0;
	var ArrayPoint = [];
	var NombreKMH = 9.2;
	var HeureDepart = 5;
	var JourDepart = 4;
	var MoisDepart = 'Juillet';
for (var i = 0; i < Customers.children.length; i++)
{
	
   var Trk = Customers.children[i];

	
	if (Trk.tagName == "trk")
	{
		for (var j = 0; j < Trk.children.length; j++)
		{
			var TrkSeg = Trk.children[j];
		
			for (var m = 0; m < TrkSeg.children.length; m++)
			{
				var elevation = TrkSeg.children[m].children[0].textContent.toString();
				
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
					var mymap = L.map('my_osm_widget_map', { /* use the same name as your <div id=""> */
					  center: [point.Lat, point.Lon], /* set GPS Coordinates */
					  zoom: 10, /* define the zoom level */
					  zoomControl: true, /* false = no zoom control buttons displayed */
					  scrollWheelZoom: true /* false = scrolling zoom on the map is locked */
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

		FeneterElevation = (ElevationMax - ElevationMin);
		console.log(ElevationMin + " Min D-");
		console.log(ElevationMax + " Max D+");
		console.log(TotalELevation + "D+");
		console.log(TotalDiminution + "D-");
		console.log(TotalKM + " km");
		
		var TxtTotalKM = document.getElementById("TotalKM");
		TxtTotalKM.innerHTML  = Math.round(TotalKM,2) + ' km';
		var TxtElevationMin = document.getElementById("ElevationMin");
		TxtElevationMin.innerHTML  = Math.round(ElevationMin,2) + ' m';
		var TxtElevationMax = document.getElementById("ElevationMax");
		TxtElevationMax.innerHTML  = Math.round(ElevationMax,2) + ' m';
		var TxtTotalElevation = document.getElementById("ELevationTotal");
		TxtTotalElevation.innerHTML  = Math.round(TotalELevation,2) + ' m';	
		var TxtTotalDiminution = document.getElementById("DiminutionTotal");
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
		AddPoint ( LastPoint, Point);
	}
	LastPoint = Point;
}	

/************* AJOUT LIGNE Vertical Coordonnée Y DENIVELATION **************/

 intElevation = parseInt(ElevationMin / 100)
 // Ligne tous les 100 mètres
ValueElevationArrondi = intElevation * 100;

while (ValueElevationArrondi < ElevationMax )
{
	AddLigneElevation(ValueElevationArrondi);	
	
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
	AddLigneVertical(partKM * i);	
}

function TransformDistanceEnPxl(Value)
{
	// Valeur = 1%
	Value1PourCent =	TotalKM / 100;
	// Calcule %  du Nombre de km
	ValuePourCent =	( Value ) / Value1PourCent;
	// Grandeur de la fenetre en poucent avec echelle max
	return	ValuePourCent * (Width / 100);
}

function TransformElevationEnPxl (Value)
{
	// Valeur = 1%
	Value1PourCent =	FeneterElevation / 100;
	// Calcule %  de l'élévation
	ValuePourCent =	( Value - ElevationMin) / Value1PourCent;
	// Grandeur de la fenetre max
	return	Height - (ValuePourCent * (Height / 100  ));
}

var TextSelected; 
var LastPassage = new Object();
// Numéro du passage trouver pour ce point
var IDPassageFind = 0;


/***** FUNCTION AJOUT DE POINT SUR LES DESSINS ****/
function AddPoint(LastPoint, Point)
{
	// Position de la ligne déniveller 
	posX1 = TransformDistanceEnPxl(LastPoint.KM) + DecalageStartWidth;
	posY1 =	TransformElevationEnPxl(LastPoint.elevation) + DecalageStartHeight;
	posX2 =	TransformDistanceEnPxl(Point.KM) + DecalageStartWidth;
	Posy2 =	TransformElevationEnPxl(Point.elevation) + DecalageStartHeight;
	
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
	
	

	/************* SI POINT DE DEPART est dans la liste des points de liste des point de passage  ****/
	
	for (var j = 0; j < ArrayPassage.length; j++)
	{
	
		if ( LastPoint.Lat  == ArrayPassage[j].Lat && LastPoint.Lon == ArrayPassage[j].Lon && !ArrayPassage[j].OnTab)
		{
			ArrayPassage[j].OnTab = true; // EN mêmoire que le point de passage est déjà sur le tableau afin d'éviter les doublon
			ArrayPassage[j].PosTextY = posY1;
			ArrayPassage[j].PosTextX = posX1;
			
			IDPassageFind = ArrayPassage[j].ID+1;
			Point.IDPassage = IDPassageFind;
			
			maLigne1.setAttribute('stroke', '#000000');
			maLigne1.setAttribute('stroke-width', 14);
			
			/*** AJOUT NOM EMPLACEMENT ***/			
			var newText = document.createElementNS("http://www.w3.org/2000/svg",'text');
			newText.setAttribute('id', 'IDPassage '+ j );
			newText.setAttributeNS(null,"x",(posX1)+ ArrayPassage[j].OffsetTextX +'px');     
			console.log(ArrayPassage[j].OffsetTextX + "off");
			newText.setAttributeNS(null,"y",(posY1)+ ArrayPassage[j].OffsetTextY +'px'); 
			newText.setAttributeNS(null,"font-size","12");
			
			var textNode = document.createTextNode(ArrayPassage[j].Nom);
			newText.appendChild(textNode);
			
			/*__________________________________________________________________ 
			
						EVENEMENT LORS DU CLICK SUR LE TEXT DU GRAPHIQUE DENIVELLE
						
			_______________________________________________________________________*/
		newText.addEventListener('click', function(e) 
		{
			e.currentTarget.setAttributeNS(null,"fill","green");
			TextSelected = e.currentTarget;
			
			// VALEUR POSITION DANS FORMULAIRE MODIFICATION
			document.getElementById("ModifNom").value = ArrayPassage[j].Nom ;
			// Garde en mémoire la position 0 du text 
			document.getElementById("PositionY").value =ArrayPassage[j].PosTextY;
			document.getElementById("PositionX").value =ArrayPassage[j].PosTextX;
			// Reprend la valeur de l'ancien offset
			document.getElementById("ModifOffsetY").value =ArrayPassage[j].OffsetTextX;
			document.getElementById("ModifOffsetX").value =ArrayPassage[j].OffsetTextY;

			
			

		});

				
			
			GraphiqueSVG.appendChild(newText);

			L.marker([LastPoint.Lat, LastPoint.Lon]).bindTooltip(ArrayPassage[j].Nom, {className: 'myCSSClass'}, 
			{
				permanent: true, 
				direction: 'right'
			}).addTo(mymap);
				
			// ** Calcul distance depuis dernier point passage
				
			if (LastPassage  != null)
			{
				// Différence KM entre deux points 
				var DiffKM = Point.KM -  LastPassage.PointDepart.KM ;
				var DiffElePos =  Point.TotalELevation -LastPassage.PointDepart.TotalELevation;
				var DiffDimi =  Point.TotalDiminution -LastPassage.PointDepart.TotalDiminution;
				var find = false;
				var NomDepart = LastPassage.NomDepart;
				var NomArrivee = ArrayPassage[j].Nom;
					
				// ************* affichage tableau point de passage *******************/
				row =	Table.insertRow(-1); // ajout d'une ligne en fin de tableau
				row.setAttribute("id","Row"+ArrayPassage[j].ID , 0);
				row.style.height = '30px';
				row.style.cursor="pointer"
				if (Table.rows.length % 2 > 0)
				{
					row.style.backgroundColor =  "rgba(242, 242,242, 0.3)" ;
				}
				else
				{
					row.style.backgroundColor =  "rgba(30, 138,194, 0.3)" ;
				}
				// Quand on click sur la ligne du tableau 
				document.getElementById('Row'+ ArrayPassage[j].ID).addEventListener('click', function(e) {
					// SI La ligne est déjà cocher remettre a zéro 
					ArrayPassage[j].checked = !ArrayPassage[j].checked;
				
					
						// Pour Chaque point entre les deux point de passage
						for (var m = 1; m < ArrayPoint.length; m++)
						{
									
							if (ArrayPoint[m].IDPassage == ArrayPassage[j].ID)
							{
								
								if (ArrayPassage[j].checked)
								{
								find = true;	
									document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke', '#ff00cc');
									document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke-width', 3);
								}
								else
								{
									document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke','#2680fb');
									document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke-width',3);
								}
						//		document.getElementById('LineParcours'+ m).setAttribute('stroke', '#ff00cc');
						//		document.getElementById('LineParcours'+ m).setAttribute('stroke-width', 10);
							}
							else
							{
							/*		if (find = true)
									{
										break;
										
									}*/
							}
							
						
					}

				});

					// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
					var cell0 = row.insertCell(0);
					var cell1 = row.insertCell(1);
					var cell2 = row.insertCell(2);
					var cell3 = row.insertCell(3);
					var cell4 = row.insertCell(4);
					var cell5 = row.insertCell(5);
					var cell6 = row.insertCell(6);
					var cell7 = row.insertCell(7); // Total KM
					var cell8 = row.insertCell(8); // Heure depart estimé
					var cell9 = row.insertCell(9); // Tempas Parcours
					// Add some text to the new cells:
						
						
					var input = '<input type="checkbox" style="width: 100%" value="1"  >';	
 
					cell0.innerHTML = input;
					cell1.innerHTML = Table.rows.length-1; // ArrayPassage[j].ID; NE pas afficher le ID pour ordrer l'index sur le tableau
					cell2.innerHTML = LastPassage.NomDepart;
					cell3.innerHTML = ArrayPassage[j].Nom;
					cell4.innerHTML = (Math.round(DiffKM*100))/100 + ' km';
					cell5.innerHTML = (Math.round(DiffElePos)) + ' m'; 
					cell6.innerHTML = (Math.round(DiffDimi)) + ' m'; ;
					cell7.innerHTML = Math.round(Point.KM) + ' km';
					cell8.innerHTML = convertNumToDate((( LastPassage.PointDepart.KM   / NombreKMH)*60)+  (((LastPassage.PointDepart.TotalELevation /100)/ NombreKMH)*60), HeureDepart,JourDepart, MoisDepart);
					cell9.innerHTML = convertNumToTime(((DiffKM  / NombreKMH)*60)+ (((DiffElePos /100)/ NombreKMH)*60)) ;
			
			}
			LastPassage = new Object();
			LastPassage.NomDepart =ArrayPassage[j].Nom ;
			LastPassage.PointDepart = Point;
			break;
		}
		else // Si le point de passage n'est pas trouver on va lui assigner le dernier èpoint de passage trouver
		{
			Point.IDPassage = IDPassageFind;
		
		}
	}


}

function convertNumToTime(number) {
	
	var hour =  0;
	var jour = 0;
	var time = '';
	if (number > 1)
	{
		var Minute = Math.floor(number);
		if (Minute >59)
		{
			
			 hour = Math.floor(number/60);
			 Minute  = Minute  - hour*60;
			// SI plus de un jour
			if (hour > 23)
			{
				jour = hour % 24;   
				hour =	hour - (jour *24);
				time = jour +'j ' ;
			}
		}
		time = time + Length2(hour) + ':' + Length2(Minute) ;
	}
	else
	{
		time = '00:' ;
	}
	
	 

	 return time;
 
}
function Length2(value)
{
	var sValue = value.toString();
	if (sValue.length < 2)
	{
		sValue = '0'+ sValue;
	}
	return sValue;
}
function convertNumToDate(number, HeureDepart, JourDepart, MoisDepart) {
	
	var hour =  0;
	var jour = 0;
	var time = '';
	if (number > 1)
	{
		var Minute = Math.floor(number);
		if (Minute >59)
		{
			hour = Math.floor(number/60) ;
			Minute  = Minute  - (hour*60);
			hour = hour + HeureDepart ;
			// SI plus de un jour
			if (hour > 23)
			{
				jour =  Math.floor(hour / 24);   
				hour =	hour - (jour *24);
				time = (jour + JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
			}
			else
			{
				time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
			}
		}
		else
		{
			hour = HeureDepart;
			
			time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
		}
	}
	else
	{
		hour = HeureDepart;
		time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
	}
	
	 

	 return time;
 
}
/** FUNCTION DESSINER LA LIGNE DE DISTANCE *************/
function AddLigneVertical( value)
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
function AddLigneElevation( value)
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
/************ FUNCTION DISTANCE QUI CALCUL AL DISTANCE ENTRE DEUX POINT ****/
function distance(lat1, lng1, lat2, lng2)
{
         pi80 = Math.PI / 180;
         lat1 = lat1 * pi80;
         lng1 = lng1 * pi80;
         lat2 =  lat2 * pi80;
         lng2 =  lng2* pi80;
  
         r = 6372.797; // rayon moyen de la Terre en km
         dlat = lat2 - lat1;
         dlng = lng2 - lng1;
         a =  Math.sin(dlat / 2) *  Math.sin(dlat / 2) +  Math.cos(lat1) *  Math.cos(lat2) *  Math.sin(dlng / 2) *  Math.sin(dlng / 2);
         c = 2 *  Math.atan2( Math.sqrt(a),  Math.sqrt(1 - a));
       return  km = r * c;
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
					<!--	Depart.PrixPlace= parseInt(<?php echo json_encode($datatxt[3]); ?>);
					<!--	Depart.Distance=<?php echo json_encode($datatxt[4]); ?>;
						ArrayPassage.push(Passage);
     }); 
    }; 

    reader.onerror = (evt) => { 
     alert(evt.target.error.name); 
    }; 				

}
</script>