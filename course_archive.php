 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?>   
<div id="image">
<script>
var myVar=setInterval(function(){myTimer()},4000);
var MonTableau = ["membre1.png","membre2.png","membre3.png","membre4.png", "membre.png"];
var i = 0;
function myTimer() {		
	i+= 1; 
	if (i>4)
	{
	i=0;
	}

	var link = "url('images/" + MonTableau[i]+"')";
document.getElementById("image").style.backgroundImage = link
  
}
</script>
  </div>
<Div id="corps">
<fieldset>
<?php include("news.php"); ?> 
<ul id ="info">


   <li><a href="liste.php">Liste des inscrits</a></li> 
    <li><a href="formulaire.php">Inscriptions</a></li> 
	  <li><a href="formulaire_equipe.php">Inscriptions �quipe</a></li>
	   <li><a href="resultat.php">R�sultats</a></li> </br> 
	   </ul>
	</br>
	<Div id="main">
<h3>Parcours</h3>

Les parcours se d�roulent principalement sur des chemins blancs ou chemins forestiers</br>
<b>Le d�part des adultes se trouve au chant du gros. Allez jusqu'� la gare du Noirmont et passez le sous voie.</b></br>
Le d�part des enfants se situe devant la halle de gym </br>
 </br>
 <center>
<p>  Grand Parcours  8.7 km </p>
  <a href="images/img_grand_parcours.jpg" class="lightbox"><img src="images/img_grand_parcours.jpg"  WIDTH=600px alt=""<alt="Photo " title="Cliquez pour agrandir" /></a>
    <li><a href="https://connect.garmin.com/activity/730802241"target=_blank> parcours d�taill�</a></li> 
	 </br>
	  </br>
<p>  Populaire et walking  7.1 km</p>
  <a href="images/img_petit_parcours.jpg" class="lightbox"><img src="images/img_petit_parcours.jpg"  WIDTH=600px alt=""<alt="Photo " title="Cliquez pour agrandir" /></a>
   <li><a href="https://connect.garmin.com/modern/activity/729634884"target=_blank> parcours d�taill�</a></li> 
    </br>
	 </br>
<p> Relais 3 x 2.4 km (possible par 2 1x 4.8 et 1 x 2.4 km) </p>
  <a href="images/relais.jpg" class="lightbox"><img src="images/relais.jpg"  WIDTH=600px alt=""<alt="Photo " title="Cliquez pour agrandir" /></a>
    
<p>   Course enfant boucle de ~300m</p>
  <a href="images/enfant_venir.jpg" class="lightbox"><img src="images/enfant_venir.jpg"  WIDTH=600px alt=""<alt="Photo " title="Cliquez pour agrandir" /></a> 
 </center>
 </div>
</fieldset>
<fieldset>
<h3>Dates</h3>
Vendredi 9 Juin 2017: Le Noirmont * (Halle de gymnastique) </br>
</br>
</fieldset>

<fieldset>
<h3>Inscriptions</h3>
Par le formulaire se trouvant sous la rubrique Inscription, pas d'inscription par t�l�phone.</br>
Les inscriptions sur place se situent en bas de la halle de gym "au caveau".</br>
   <li><a href="formulaire.php">Inscriptions</a></li> </br>
</fieldset>
<fieldset>
<h3>�quipes</h3>
Un classement par �quipe (�quipe ou entreprise) aura lieu sur le grand </br>
parcours et sera �tabli avec le cumul des temps des <b>3</b> membres de l'�quipe.</br></br>
 <b> Inscriptions des �quipes gratuites,  chaque personne de l'�quipe doit d�j� �tre inscrite en individuel </b></br>
	  <li><a href="formulaire_equipe.php">Inscriptions �quipe</a></li>
</fieldset>
<fieldset>
<h3>Relais</h3>
Le relais � 3 se fait sur le petit parcours et est divis� en 3 relais de 2.4km. </br>
L'acc�s aux zones de relais se fera � pied, encadr� par des organisateurs.</br>
</fieldset>
<fieldset>
<h3>Sprint</h3>
Pour participer au sprint, il suffit d'�tre inscrit dans une des cat�gories du petit ou du grand parcours.</br>
 <b>Les vainqueurs, homme et femme, seront ceux qui attraperont les peluches situ�es 400m apr�s le d�part.</b></br>
 Ils devront obligatoirement terminer le parcours (ou l'�quipe dans le cas d'un relais) pour �tre </br>
d�clar�s vainqueurs.</br>
</fieldset>
<fieldset>
<h3>Restauration et Vestiaires</h3>
Les vestiaires de la halle de gym sont � votre disposition.</br>
Des restaurations chaudes sont � votre disposition dans la halle de gym.</br>
</fieldset>
<fieldset>
<h3>D�lai d'inscription</h3>
Jeudi 8 Juin 14:00  (aucune exception, les dossards seront attribu�s le 2 Juin)</br>
</fieldset>
<fieldset>
<h3>Frais d'inscription � payer sur place</h3>
Parcours adultes: </br>
Fr. 20.- pour les adultes inscrits sur internet </br>
<b>Inscriptions sur place jusqu'� 45 minutes avant votre d�part, majoration de Fr. 5.-</b></br>
Parcours enfants: </br>
Fr. 8.- pour les enfants inscrits sur internet </br>
<b>Inscriptions sur place jusqu'� 45 minutes avant votre d�part, majoration de Fr. 5.-</b></br>
</fieldset>
<fieldset>
<h3>Assurances</h3>
Les organisateurs d�clinent toute responsabilit� en cas d'accident ou de vol
</fieldset>
<fieldset>
<h3>Programme & Flyer</h3></br>
 <li><a href="pdf/programme CF16 A5 web.pdf">Programme</a></li> </br>

</fieldset>

<fieldset>
<h3>Sponsors</h3></br>
 <?php include ("sponsors.php"); ?>
 <fieldset>
<?php include ("footer.php"); ?>

</div>
</body>
</html>