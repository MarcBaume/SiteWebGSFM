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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
function isMail2(txtMail)
{
	var regMail=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z. -]{2,}[.]{1}[a-z]{2,5}$", "i");
	return regMail.test(txtMail);
}
function check2(f1) {
	if (f1.nom.value.length<3) {
		alert("Merci d'indiquer votre nom");
		f1.nom.focus();
		return false;
	}

		if (f1.prenom.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f1.prenom.focus();
		return false;
	}
		if (!isMail2(f1.email.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f1.email.focus();
		return false;
	}
	
			if (f1.ville.value.length<3) {
		alert("Merci d'indiquer votre localite");
		f1.ville.focus();
		return false;
	}
	
		if (f1.date.value.length!=4) {
		alert("Merci d'indiquer votre année de naissance ex: 1988");
		f1.date.focus();
		return false;
	}
		if (f1.Parcours1.checked == false && 
		f1.Parcours2.checked == false && 
		f1.Parcours3.checked == false && 
		f1.Parcours4.checked == false && 
		f1.Parcours5.checked == false && 
		f1.Parcours6.checked == false && 
		f1.Parcours7.checked == false && 
		f1.Parcours8.checked == false && 
		f1.Parcours9.checked == false && 	
		f1.Parcours10.checked == false &&
		f1.Parcours11.checked == false &&
		f1.Parcours12.checked == false &&
		f1.Parcours13.checked == false &&
		f1.Parcours14.checked == false &&
		f1.Parcours15.checked == false &&
		f1.Parcours16.checked == false &&		
		f1.Parcours17.checked == false &&	
		f1.Parcours18.checked == false &&	
		f1.Parcours19.checked == false &&	
		f1.Parcours20.checked == false &&	
		f1.Parcours21.checked == false &&	
		f1.Parcours22.checked == false &&	
		f1.Parcours23.checked == false &&	
		f1.Parcours24.checked == false &&	
		f1.Parcours25.checked == false &&	
		f1.Parcours26.checked == false &&
		f1.Parcours27.checked == false 
		) {
		alert("Cocher au moins un point de pointage");
		return false;
	}
	

	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f1.submit();
	}
	
	
}
</script>
   <body>



</div>
<div style="float:left;">

<table  id="ImageMap"width="900px">
	<tr>
		<td>
			<div id="my_osm_widget_map" style="height:450px;">
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

<Table width = "900px" >
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
			Total dénivelé positif  :
		</td>
		<td width = "15%">
			<p id="ELevationTotal"> </p>
		</td>
			<td width = "15%">
			Total dénivelé négatif :
		</td>
		<td width = "15%">
			<p id="DiminutionTotal"> </p>
		</td>
	</tr>
	<tr>
		<td width = "15%">
			Alititude minimum : 
		</td>
		<td width = "15%">
			<p id="ElevationMin"> </p>
		</td>
		<td>
		</td>
		<td width = "15%">
			altitude maximum : 
		</td>
		<td width = "15%">
			<p id="ElevationMax"> </p>
		</td>
	</tr>
</table>

	


</div>	
 <div  id="TableauResulat">
<!-- Table des différent point de passage -->



 	<form method="post" action="cible.php" name="Formulaire">


	<Table style="width:1024px;" ID="TablePassage">
			<tr onClick="ClickAllRows(event)" style="cursor: pointer; backgroundColor :rgba(242, 242,242, 0.3) ">
				<td style="width:auto;">
					
					<i class="fa fa-user" ></i> 
					
				</td>
				<td style="width:auto;">

					Afficher tous les athlètes
					
				</td>
		 </tr>
	</table>


	<Table id="TablePointPassage"  width = "1024px" style="border:1px solid #d3d3d3;">
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
               Temps estimé
			</th>
			<Th>
                Heure départ estimé
			</th>
		</Tr>
		<!-- Ajout des lignes depuis le javascript -->
	</Table>
<!--<p>
	Si vous voulez participer à notre aventure, veuillez remplir ce formulaire afin de vous inscrire à un ou plusieurs segement(s).</br></br>
 - Cocher les étapes que vous désirez courir. </br> </br>
 - Vous pouvez en choisir plusieurs, consécutives ou non.  </br> </br>
 - Les déplacements seront organisés par le bus suiveur. </br> </br>
 </p>
		
		<p><label for="nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10"   /></p>
		<p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20"/></p>
		<p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"/></p>
		<p><label for="Telephone">Téléphone *:</label> <input type="text" name="Telephone" id="Telephone" tabindex="50"/></p>
		<p><label for="date">Année de naissance *:</label> <input type="text" name="date" id="date" tabindex="60"/></p>
		<p><label for="localite">Localité *:</label> <input type="text" name="ville" id="ville"tabindex="70"/></p>
		<p><label for="Coureur">Choix:</label> <input type="radio" name="choix" id="Coureur"tabindex="80"/>Coureur 
												<input type="radio" name="choix" id="Accompagnant"tabindex="81"/>Accompagnant</p>
		<p><label for="Remarque">Commentaire:</label> 	<textarea rows="4" cols="50" name="Remarque"tabindex="90" ></textarea>
	
		<input type="button"  id="ButtonSend" value="je m'inscris" onclick="check2(this.form )" style= " width: 100px; height: 50px";>  </br>
	
		</form>

</div>-->

</div>
 <script>
 /******************* Lecture fichier coordonnée *************************/
	
	var ArrayPassage = [];
	var Table = document.getElementById("TablePointPassage");
    var TableBus = document.getElementById("TableAuto");
	var Counter = 0;
/******************* Lecture fichier coordonnée *************************/
</script>
 
	<?
// Lecture du fichier info.txt 	
	$pathFileInfo = 'File/coordonnee2.txt';
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
				var ArrayAthlete = [];
                var ArrayDeplacement = [];
					Passage.ID = <?php echo json_encode($datatxt[5]); ?>;
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
				//	console.log("offset:" +Passage.OffsetTextX );
					Passage.PosTextX = 0;
					Passage.PosTextY = 0;


                    var strHeurePassage = <?php echo json_encode($datatxt[6]); ?>;

                     // Si passage déjà franchie selon une heure de départ
                    if (strHeurePassage.length>5)
                    {
                        console.log( strHeurePassage );
                        Passage.HeurePassage = new Date(strHeurePassage);
                    
                    }
					</script>
					<?
					
					//Dans la base de donnée afficher le nombre de personne partante pour cette ID -->
			
				$ID =$datatxt[5];

				$sql = 'SELECT * FROM TourDuJura  WHERE IDParcours=\''.$ID. '\'';
				$result = mysqli_query($con,$sql);
				if ($result && mysqli_num_rows($result) > 0) {
					while($donnees = mysqli_fetch_assoc($result)) {
						?>
						<script>
						var Athlete= new Object();
						Athlete.Nom =<?php echo json_encode($donnees['Nom']); ?>;
						Athlete.Prenom =<?php echo json_encode($donnees['Prenom']); ?>;
						Athlete.Localite =<?php echo json_encode($donnees['Localite']); ?>;
						Athlete.Accompagnant =<?php echo json_encode($donnees['choix']); ?>;
						ArrayAthlete.push(Athlete);

						</script><?
					}
				}
				 // Tout les déplacement prévu pour ce parcours  
                $sql = 'SELECT * FROM TourDuJuraDeplacement  WHERE IDParcours=\''.$ID. '\'';
				$result = mysqli_query($con,$sql);
				if ($result && mysqli_num_rows($result) > 0) {
					while($donnees = mysqli_fetch_assoc($result)) {
						
						?>
						<script>
							var Deplacement= new Object();
							Deplacement.Localite =<?php echo json_encode($donnees['Localite']); ?>;
							Deplacement.Type =<?php echo json_encode($donnees['Type']); ?>; // Type de déplacement bus ou voiture 
							Deplacement.Temps =<?php echo json_encode($donnees['Temps']); ?>;
							ArrayDeplacement.push(Deplacement);
						</script>
						<?
					}
				}
				?>
				<script>
                 Passage.ArrayDeplacement = ArrayDeplacement;
					Passage.ArrayAthlete = ArrayAthlete;
					ArrayPassage.push(Passage);
					 
				</script><?
		
			}
		}
	}
				
	?>
	   <script>
	 

	var Width  = 900;//133 screen.width -200; // 1300
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
	var JourDepart = 29;
	var MoisDepart = 'Mai';
var FormulaireOpen = false; // Inscription ouverte 

    var DateDepart = new Date('2021-05-29T05:00:00');


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
		// lecture position actuel de l'ordinateur 
		ReadPosition();



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
	/* Evénement ligne elevation 
	document.getElementById('LineElevation'+ Point.index).addEventListener('click', function(e) 
	{
		e.currentTarget.setAttribute('stroke', '#ff00cc');
		e.currentTarget.setAttribute('stroke-width', 10);
		document.getElementById("Lat").value = LastPoint.Lat ;
	  	document.getElementById("Len").value = LastPoint.Lon;
		document.getElementById("ele").value = LastPoint.elevation;
		document.getElementById("dist").value = LastPoint.KM;
	});*/
	
	

	/************* SI POINT DE DEPART est dans la liste des points de liste des point de passage  ****/
	
	for (var j = 0; j < ArrayPassage.length; j++)
	{

		if ( LastPoint.Lat  < ArrayPassage[j].Lat +0.00001 && 
			LastPoint.Lat  > ArrayPassage[j].Lat -0.00001 && 
			LastPoint.Lon < ArrayPassage[j].Lon  +0.00001 && 
			LastPoint.Lon  > ArrayPassage[j].Lon -0.00001 
			&& !ArrayPassage[j].OnTab)
		{
						
			ArrayPassage[j].OnTab = true; // EN mêmoire que le point de passage est déjà sur le tableau afin d'éviter les doublon
			ArrayPassage[j].PosTextY = posY1;
			ArrayPassage[j].PosTextX = posX1;
			
            /********************* CHAQUE POINT DE PASSAGE DOIT AVOIR 10 écart ********************** */

            /**************************************************************************************************** */
			IDPassageFind = parseInt(ArrayPassage[j].ID)+10;
			Point.IDPassage = 999999;//IDPassageFind; NE pas utiliser pour le premier point 
			
			maLigne1.setAttribute('stroke', '#000000');
			maLigne1.setAttribute('stroke-width', 14);
            maLigne1.setAttribute('id', 'Passage'+Point.IDPassage );
			
			/*** AJOUT NOM EMPLACEMENT ***/			
			var newText = document.createElementNS("http://www.w3.org/2000/svg",'text');
			newText.setAttribute('id', 'IDPassage '+ j );
			newText.setAttributeNS(null,"x",(posX1)+ ArrayPassage[j].OffsetTextX +'px');     
		
			newText.setAttributeNS(null,"y",(posY1)+ ArrayPassage[j].OffsetTextY +'px'); 
			newText.setAttributeNS(null,"font-size","12");
			
			var textNode = document.createTextNode( j +":"+ArrayPassage[j].Nom);
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
            ArrayPassage[j].PointDepart = Point;

/************************************************************************************

                Tableau de passsage

************************************************************************* */

			if (LastPassage  != null)
			{
				// Différence KM entre deux points 
				var DiffKM = Point.KM -  LastPassage.PointDepart.KM ;
				var DiffElePos =  Point.TotalELevation -LastPassage.PointDepart.TotalELevation;
				var DiffDimi =  Point.TotalDiminution -LastPassage.PointDepart.TotalDiminution;
				var find = false;
				var NomDepart = LastPassage.NomDepart;
				var NomArrivee = ArrayPassage[j].Nom;
				/*__________________________________________________________________________

									AJOUT POINT PASSAGE DANS TABLEAU
									
					_______________________________________________________________________*/
					
				// ************* affichage tableau point de passage *******************/
				
				row =	Table.insertRow(-1); // ajout d'une ligne en fin de tableau
				row.setAttribute("id","Row"+ArrayPassage[j].ID , 0);
				row.style.height = '30px';
				row.style.cursor="pointer"

				// Modulo Pour couleur dans tableau
				if (CountPassage % 2 > 0)
				{
					row.style.backgroundColor =  "rgba(242, 242,242, 0.3)" ;
				}
				else
				{
					row.style.backgroundColor =  "rgba(30, 138,194, 0.3)" ;
				}


				
				// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
				var cell0 = row.insertCell(0);
				var cell1 = row.insertCell(1);
				var cell2 = row.insertCell(2);
				var cell3 = row.insertCell(3);
				var cell4 = row.insertCell(4);
				var cell5 = row.insertCell(5);
				var cell6 = row.insertCell(6);
				var cell8 = row.insertCell(7); // Heure depart estimé
				var cell9 = row.insertCell(8); // Tempas Parcours
				var cell10 = row.insertCell(9);
				// Add some text to the new cells:
					
				CountPassage =  CountPassage +1;	
			//	var input = '<input type="checkbox" style="width: 25px ; height: 25px" value="'++'" name=+'" ID="Parcours"'+(CountPassage.toString())+'">';	
			
            // Si le formulaire est ouvert 
            if (FormulaireOpen)
            {
            	var input = document.createElement("INPUT");
				input.setAttribute("type", "checkbox");
				input.setAttribute("value", ArrayPassage[j].ID);
				input.setAttribute("Name", "Parcours"+CountPassage.toString());
				input.setAttribute("ID", "Parcours"+CountPassage.toString());
				input.style.width="25px";
				input.style.height="25px";

                								// Quand on click sur la ligne du tableau de point de passage
				input.addEventListener('change', function(e) 
				{
				
					// SI La ligne est déjà cocher remettre a zéro 
				//	ArrayPassage[j].checked = !ArrayPassage[j].checked;
				
					// Pour Chaque point entre les deux point de passage
					for (var m = 1; m < ArrayPoint.length; m++)
					{
						//			console.log(ArrayPoint[m].IDPassage);
						if (ArrayPoint[m].IDPassage == ArrayPassage[j].ID)
						{
				
							if (this.checked)
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
						}
					}
				
					

				});
              
            }
            else
            {           // Affiche si la  L'état du live  si ségement réalisé ou pas 
                var input = document.createElement("i");
                input.style.width="40px";
			 	input.style.height="40px";
              input.style.fontSize ="24px";
             
                if ( ArrayPassage[j].HeurePassage == undefined)
                {
                  
                    input.setAttribute("class", "fa fa-times");

                }
                else
                {
                    
                    input.style.color = "#1dee71";
                    input.setAttribute("class", "fa fa-check");
                   // cell1.innerHTML = 	'<i class="fa fa-wrong"  style= "font-size: 24px;margin:8px;margin-left:10px;color: #4095f5;"></i>'
                }
											

            }

            cell0.append( input);
		
	
				cell1.innerHTML = ArrayPassage[j].ID; //CountPassage.toString(); // ArrayPassage[j].ID; NE pas afficher le ID pour ordrer l'index sur le tableau
				cell2.innerHTML = LastPassage.Nom; // Départ 
				cell3.innerHTML = ArrayPassage[j].Nom + ' ( '+Math.round(Point.KM)+'km)';
				cell4.innerHTML = (Math.round(DiffKM*100))/100 + ' km';
				cell5.innerHTML = (Math.round(DiffElePos)) + ' m'; 
				cell6.innerHTML = (Math.round(DiffDimi)) + ' m'; ;

                // Calcul du temps de l'étape
                TimeStep = convertNumToTime(((DiffKM  / NombreKMH)*60)+ (((DiffElePos /100)/ NombreKMH)*60)) ;

                cell8.innerHTML = TimeStep;

                // Affiche Heure de départ
                console.log("Last PAssage :"+ LastPassage.HeurePassage.toLocaleString());
                cell9.innerHTML =  LastPassage.HeurePassage.toLocaleString();

				// Calcul du temps a effectuer si le passage n'est pas encore franchie 
                if ( ArrayPassage[j].HeurePassage == undefined)
                {
                 
                    // Pour premier passage 
                    if (LastPassage.HeurePassage  == undefined)
                    {
                        ArrayPassage[j].HeurePassage  = Add2Date(DateDepart ,  TimeStep);
                    }
                    else
                    {
                        ArrayPassage[j].HeurePassage  = Add2Date(LastPassage.HeurePassage, TimeStep);
                    }
                   
                   
                }
                else
                // SI le passage est franchie par les coureurs 
                {
         
                    DateDepart = ArrayPassage[j].HeurePassage;

                	// Change La couleur des points de passages avant en vert pour signifier que les coureurs sont passé à ces point de passages 

					for (var m = 1; m < ArrayPoint.length; m++)
					{
						if (ArrayPoint[m].IDPassage == ArrayPassage[j].ID)
						{
				
							
								document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke','#1dee71');
								document.getElementById('LineElevation'+ ArrayPoint[m].index).setAttribute('stroke-width',5);
							
						}
					}
			
                }

		
                // Affiche Herure arrivée
              //  ArrayPassage[j].HeurePassage.toLocaleString();

                LastPassage = new Object();

                // Copie du passage dans la variable tampon du dernier passage 
                LastPassage = ArrayPassage[j];
             //   LastPassage.NomDepart =ArrayPassage[j].Nom ;
              //  LastPassage.PointDepart = Point;
 

				if (ArrayPassage[j].ArrayAthlete.length > 0)
				{
					/* TABLEAU Athlete */
					rowAthlete =	Table.insertRow(-1); // ajout d'une ligne qui va contenire le talbeau des athletes
					rowAthlete.id ="RowAthlete"+ArrayPassage[j].ID;
					rowAthlete.style.visibility = "collapse";
		
					// Evenement lors du click de la ligne 
					row.addEventListener('click', function(e) 
					{
						console.log(ArrayPassage[j].ID);
					if (document.getElementById("RowAthlete"+ArrayPassage[j].ID).style.visibility == "collapse")
					{
						document.getElementById("RowAthlete"+ArrayPassage[j].ID).style.visibility = "visible"
					}
					else
					{
						document.getElementById("RowAthlete"+ArrayPassage[j].ID).style.visibility = "collapse"
					}
					});
					
					
					
					cell10.innerHTML = ArrayPassage[j].ArrayAthlete.length  + 'x '+'<i class="fa fa-user" ></i>' ;
				

					// Cellule de la ligne athète
					var cellTableAthlete0 = rowAthlete.insertCell(0);
					cellTableAthlete0.style="width: 100%";
					cellTableAthlete0.colSpan="1000";
					
					// Creation tableau athètes
					var TableAthlete = document.createElement('table');
					
					for(var h = 0; h < ArrayPassage[j].ArrayAthlete.length; h++)
					{
						var	rowAthle =	TableAthlete.insertRow(-1); // ajout d'une ligne athlètes

						// Ajout tableau dans cellule 
						
						var cellAthlete1 = rowAthle.insertCell(0);
						var cellAthlete2 = rowAthle.insertCell(1);

						cellAthlete1.innerHTML = ArrayPassage[j].ArrayAthlete[h].Nom + " "+ ArrayPassage[j].ArrayAthlete[h].Prenom;
						cellAthlete2.innerHTML = ArrayPassage[j].ArrayAthlete[h].Localite ; 
					}
					cellTableAthlete0.appendChild(TableAthlete);
				}
		
			}
            else
            {
                LastPassage = new Object();
              
                LastPassage = ArrayPassage[j];
                console.log(LastPassage);
            }

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
function convertNumToDate2(number, HeureDepart, JourDepart, MoisDepart) {
	
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
                jour = JourDepart;
		//		time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
			}
		}
		else
		{
			hour = HeureDepart;
			jour = JourDepart;
		//	time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
		}
	}
	else
	{
        jour = JourDepart;
		hour = HeureDepart;
		//time = (JourDepart) +' '+ MoisDepart + ' ' + Length2(hour) + ':' + Length2(Minute)  ;
	}
	
    time = new Date();
    time.setDate(jour);
    time.setMonth(MoisDepart);
    time.setHours(hour);
    time.setMinutes(Minute);

	 return time;
 
}
function Add2Date(Date1 , Date2)
{

  arrDate =  Date2.split(":");
  var Test = Date1.getHours();
  var Test2 = Date1.getMinutes();
    Date1.setHours(Test+parseInt(arrDate[0]) );
    Date1.setMinutes(Test2+parseInt(arrDate[1] ));
  console.log(Date1);


    return  Date1;
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
	var ArrayPassage ;
/*function ReadFileCoordonee()
{

	var Table = document.getElementById("TablePointPassage");
	const reader = new FileReader(); 
ArrayPassage = [];
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
                Passage.HeurePassage = new Date();
			var Linesplit =	line.split(";");
				Passage.Nom= Linesplit[0];
				Passage.Lat = Linesplit[1];
				Passage.Lon = Linesplit[2];

                // Si passage déjà franchie selon une heure de départ
                if (LineSplit.Count>3)
                {
                    Passage.HeurePassage = Date.pars(Linesplit[3]);
                }

				ArrayPassage.push(Passage);
     }); 
    }; 

    reader.onerror = (evt) => { 
     alert(evt.target.error.name); 
    }; 				

}*/
 var AllVisible = false;
function ClickAllRows()
{

		for(var j = 0; j < ArrayPassage.length; j++)
		{
			if  (ArrayPassage[j].ArrayAthlete.length> 0)
			{
				console.log(ArrayPassage[j].ID);
				var TotID = parseInt(ArrayPassage[j].ID) ;
				
					if (AllVisible == false)
					{
						document.getElementById("RowAthlete"+ArrayPassage[j].ID).style.visibility = "visible";
						
					}
					else
					{
						document.getElementById("RowAthlete"+ArrayPassage[j].ID).style.visibility = "collapse";
	
					}
			}				
		}
		
		if (AllVisible == false)
		{
			AllVisible = true;
		}
		else
		{
			AllVisible = false;
		}
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
// Ajout Marker à position trouver
var greenIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

	L.marker([lat,lng], {icon: greenIcon}).addTo(mymap);
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

function AddMakerPosition(lat,lng)
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
  
	  L.marker([lat,lng], {icon: greenIcon}).addTo(mymap);
}
</script>
<?
$sql = 'SELECT * FROM Position2';
$result = mysqli_query($con,$sql);
if ($result && mysqli_num_rows($result) > 0) {
	while($donnees = mysqli_fetch_assoc($result)) {
		?>
		<script>
		AddMakerPosition(<?php echo json_encode($donnees['Nom']); ?>,<?php echo json_encode($donnees['Prenom']); ?>)
	

		</script><?
	}
}?>