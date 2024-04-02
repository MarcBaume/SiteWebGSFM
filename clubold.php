 <!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
<body>
        		
<?php include("en_tete.php"); ?> 
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
  </div>
<script>
var myVar=setInterval(function(){myTimer()},4000);
var MonTableau2 = ["club.jpg","club.jpg","club.jpg","club.jpg", "club.jpg"];
var i = 0;
function myTimer() {		
	i+= 1; 
	if (i>4)
	{
	i=0;
	}

	var link = "url('images/" + MonTableau2[i]+"')";
document.getElementById("image").style.backgroundImage = link
  
}
</script>
<Div id="corps">
<?php include("news.php"); ?> 
<h2>     Bienvenue sur le site</h2>
<h2>du Groupe Sportif Franches-Montagnes	</h2>

   
	 Nous sommes un groupe qui pratique principalement la course � pied.</br>
Le groupe est ouvert aux personnes de tous les �ges, enfants et adultes. </br>
	Si vous avez envie de vous entra�ner avec une bonne �quipe,</br>
	nous serons ravis de vous accueillir.</br>
	<a href="images/img_accueil2.jpg"  class="lightbox"><img src="images/img_accueil2.jpg"  width="700"></img></a>

		
 <?php// include ("event.php"); ?>
		<H2> Entra�nements </h2>
<?php
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM Entrainement  ORDER BY num ASC');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
<Fieldset>
<legend> <h3> <?php echo $donnees['jour'] ?> </h3> </legend>
<p>Lieu: <?php echo $donnees['lieu']  ?><br/></p>
<p>Horaire: <?php echo $donnees['debut']  ?> � <?php echo $donnees['fin'] ?> <br/></p>
<p>Activit�s: <?php echo $donnees['activite']  ?><br/></p>
</Fieldset>


  <?php }
      $reponse->closeCursor(); // Termine le traitement de la requête
  ?>
 
<h2>Inscription club </h2>
		
		<a href="formulaire_club.php">formulaire d'inscription club</a>

<?php
  include ("sponsors.php"); 
  include ("footer.php"); ?>
 </div>

 </body>

</html>

