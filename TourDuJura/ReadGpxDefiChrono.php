
<!-- Import Leaflet CSS Style Sheet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<!-- Import Leaflet JS Library -->
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="../js/prototype.js" >
</script>
<html>
<body>
<div id="divMain">

</div>
</body>
</html>
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

function TableImage(id)
{
	let b2 = document.body;
	TableTotal = document.createElement('Table');
	TableTotal.style.width ="80%";
	TableTotal.setAttribute("id", "ImageMap");
	
	tr1 = document.createElement('Tr');
	td1 = document.createElement('Td');
	
	
	divMap = document.createElement('div');
	divMap.style.height ="300px";
	divMap.setAttribute("id", "my_osm_widget_map");
	td1.append(divMap);
	tr1.append(td1);
	TableTotal.append(tr1);
	
	tr2 = document.createElement('Tr');
	td2 = document.createElement('Td');
	
	divGraph = document.createElement('div');
	divGraph.style.height ="300px";
	divGraph.setAttribute("id", "conteneurSVG");
	td2.append(divGraph);
	tr2.append(td2);
	TableTotal.append(tr2);
	
	b2.append(TableTotal);
	TableResume(id);
}



function TableResume(id)
{
	let b = document.body;
	TableTotal2 = document.createElement('Table');
	TableTotal2.style.width ="80%";
	tr1 = document.createElement('Tr');
	
	td1 = document.createElement('Td');
	td1.style.width = "15%";
	td1.innerHTML = "Total distance : ";
	tr1.append(td1);
	
	td2 = document.createElement('Td');
	td2.style.width = "15%";
	td2.setAttribute("id", "TotalKM");
	tr1.append(td2);
	
	td3 = document.createElement('Td');
	td3.style.width = "15%";
	td3.innerHTML = "Total D+ : ";
	tr1.append(td3);
	
	td4 = document.createElement('Td');
	td4.style.width = "15%";
	td4.setAttribute("id", "ELevationTotal");
	tr1.append(td4);
	
	td5 = document.createElement('Td');
	td5.style.width = "15%";
	td5.innerHTML = "Total D- : ";
	tr1.append(td5);
	
	td6 = document.createElement('Td');
	td6.style.width = "15%";
	td6.setAttribute("id", "DiminutionTotal");
	tr1.append(td6);
	TableTotal2.append(tr1);
	
	tr2 = document.createElement('Tr');
	
	td11 = document.createElement('Td');
	td11.style.width = "15%";
	td11.innerHTML = "Elevation Min : ";
	tr2.append(td11);
	
	td12 = document.createElement('Td');
	td12.style.width = "15%";
	td12.setAttribute("id", "ElevationMin");
	tr2.append(td12);
	
	td13 = document.createElement('Td');
	td13.style.width = "15%";
	td13.innerHTML = "Elevation Max :";
	tr2.append(td13);
	
	td14 = document.createElement('Td');
	td14.style.width = "15%";
	td14.setAttribute("id", "ElevationMax");
	tr2.append(td14);
	TableTotal2.append(tr2);
	
	b.append(TableTotal2);
	
}

	TableImage(1);

	var Width  = 800;//133 screen.width -200; // 1300
	var Height = (Width /100) *18;
	var DecalageStartWidth = 50; // Valeur de décalage du commencement du graphique en horizontal
var DecalageStartHeight = 50; // Valeur de décalage du commencement du graphique en vertical
var indexPassage = 1;



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

var CountPassage = 0;
 // Create a connection to the file.
  var Connect = new XMLHttpRequest();
  // Define which file to open and
  // send the request.
  Connect.open("GET", "test2.xml", false);
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
		//console.log(TrkSeg);
			for (var m = 0; m < TrkSeg.children.length; m++)
			{
				// ** Modifier comparer a read gpx du tour du jura
			
				var x = TrkSeg.children[m].getElementsByTagName("ele")[0];
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
					var mymap = L.map('my_osm_widget_map', { /* use the same name as your <div id=""> */
					  center: [point.Lat, point.Lon], /* set GPS Coordinates */
					  zoom: 14, /* define the zoom level */
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