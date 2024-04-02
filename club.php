 <!DOCTYPE html >
<html >
<?php include("head.php"); ?>
<body>
        		
<a  class="ImgVignette"><img style="width:400px;" src="images/logo_GSFM.png"   alt=""  /></a>
</br>

<?php include("menu_vertical.php"); ?> 
<?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère  une valeur aléatoire dans la base de donné
    $reponse = $bdd->query('SELECT * FROM accueil  WHERE page = \'index\'LIMIT 1');
    // On affiche chaque entrée une à une
     $donnees = $reponse->fetch();
	  $texte= nl2br($donnees['texte']);
}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
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


<Div id="main">
<?php include("news2.php"); ?> 
<a>
<h2>Groupe Sportif Franches-Montagnes	</h2>

<p class="titleCenter">Vidéo Présentations du club</p>
<fieldset>
	<center>
<iframe width="80%"  src="https://www.youtube.com/embed/t1JTvMPRzVM" frameborder="0" allowfullscreen></iframe>
 </center>
 </fieldset>

<fieldset>
<p>	 Nous sommes un groupe pratiquant principalement la course ?ied.</br>
Le groupe est ouvert aux enfants et aux adultes. </br></br>
	Si vous avez envie de vous entra?r avec une bonne ?ipe,
	nous serons ravis de vous accueillir.</br></br></p>
	<center>
	<a href="images/img_accueil2.jpg"  class="lightbox"><img src="images/img_accueil2.jpg"  width="800"></img></a>
	</br>

	
	</div>


	<fieldset>
	<Div id="main">
	<center>	<H2> Entrainements </h2> </center>
	<fieldset>
<?php
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM Entrainement  ORDER BY num ASC');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
	
 
 <h3> <?php echo $donnees['jour'] ?> </h3> 
<p>Lieu: <?php echo $donnees['lieu']  ?><br/></p>
<p>Horaire: <?php echo $donnees['debut']  ?> - <?php echo $donnees['fin'] ?> <br/></p>
<p>Activité: <?php echo $donnees['activite']  ?><br/></p>



  <?php }
      $reponse->closeCursor(); // Termine le traitement de la requête
  ?>
  </fieldset>
  
  </div>
 </Fieldset>
 


 <fieldset>
 <Div id="main">
<h2> Club </h2>
		<fieldset>
		<a href="formulaire_club.php">formulaire d'inscription club</a>
	<!--	</br> </br>
			<a href="formulaire_maillot.php">formulaire Commande Maillot</a>-->
		</fieldset>
		</div>
 </Fieldset>
 <fieldset>
<Div id="main">
<H2>Contacts</H2>
<FIELDSET>
<b> </b></br> 

information.gsfm@gmail.com </br>  

</br><b>
<span style="text-decoration: underline;"> Président</span>
</b></br> 

Patrick Jeanbourquin</br>
078/629.55.74</br>

jeanbourquin_p@yahoo.fr   </br>  
</br>  
<b>
<span style="text-decoration: underline;">Vice Président</span>
</b> </br>
Claude Oeuvray </br>
078/862.89.57    </br>  
 
</br>  

<b><span style="text-decoration: underline;">Trésorier</span> </b></br>
Michel Joly </br>
079/276.42.19  </br>  
</br>  
<b><span style="text-decoration: underline;">Secrétaire</span> </b></br>
Noémie Montagnat-Rentier</br>
(renseignements inscriptions au club adultes)</br>
078/612.60.03 </br>
</br>
<b><span style="text-decoration: underline;">Responsable promotion du club</span>  </b>  </br>  
Céline Dubois  </br>  
(renseignements entraînements, JS, inscriptions au club des enfants) 
079/355.82.60   </br>  

</br>

<b><span style="text-decoration: underline;"> Responsable communication / Informations</span>  </b>  </br>  
Mavi Garcia    </br>  
076/331.31.02    </br>  
</FIELDSET>
</div>
	<Div id="main">

<h1>Liens</h1>
<fieldset>
<p><li><a href="http://www.letropheejurassien.ch"target="_blank">Trophée Jurassien</a></li></p>

<p><li><a href="http://www.4foulees.ch"target="_blank">4 Foulées</a></li></p>

<p><li><a href="http://juradefi.ch/"target="_blank">Jura Défi</a></li></>
<a href="admin/zone_admin.php"><img style="float: Right" src="images/admin.png"  WIDTH=40px HEIGHT=40px title="Zone administrateurs"></a> 
 </BR>  
  </BR> 
  </br>

</fieldset>
 </div>
 <div class="title">Sponsors club</div>

<img style="margin-left: 10%;margin-right: 10%; width:80%;" src="images/SponsorsClub.jpg"   alt=""  /></a>


 <?php include ("footer.php"); ?>
 </div>

 </body>

</html>

