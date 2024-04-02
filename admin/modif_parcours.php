
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
   </head>
  
 <?php include("en_tete.php"); ?> 
 <?php include("menu_admin.php"); ?> 



<div id="corps">


	<h3> Getion des parcours</h3>
	<?php
	 // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM parcours');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {?>
	<fieldset>
	<legend> <?php echo ("nom du parcours:". $donnees['nom']);?></legend>
	<?php echo ("abréviation:". $donnees['abreviation']);?></br>
	<?php echo ("informations:". $donnees['information']);?></br>
	<?php echo ("nom de l'image 1:". $donnees['image_1']);?></br>
	<?php echo ("image 1:". $donnees['nom_image_1']);?></br>
	<?php echo ("nom de l'image 2:". $donnees['nom_image_2']);?></br>
	<?php echo ("image 2:". $donnees['image_2']);?></br>
	</fieldset>
   <?php }
 $reponse->closeCursor(); // Termine le traitement de la requête
?>
<form method="post" action="ajout_parcours.php">
 <p><label for="Nom">Abréviation:</label> <input type="text" name="abreviation" id="abreviation" tabindex="10" /></p>
  <p><label for="Nom">Nom:</label> <input type="text" name="nom" id="nom" tabindex="20" /></p>
  <p><label for="Nom">Distance:</label> <input type="text" name="distance" id="distance" tabindex="24" /></p>
  <p><label for="nom">Informations:</label> <textarea name="information" id="information"tabindex="25" rows="4" cols="80"   ></textarea><br/><br/>
   <p><label for="Nom">Nom de l'image 1:</label> <input type="text" name="nom_image_1" id="nom_image_1" tabindex="30" /></p>
  <label for="photo">Image 1:</label><input type="file"  name='image_1' />
   <p><label for="Nom">Nom de l'image 2:</label> <input type="text" name="nom_image_2" id="nom_image_2" tabindex="40" /></p>
  <label for="photo">Image 2:</label><input type="file"  name='image_1' />
  <input type="submit" value="ajouter">
</form>
	
  </div>
</html>

 
