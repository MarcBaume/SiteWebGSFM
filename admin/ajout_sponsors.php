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
<?php

try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video

    $reponse = $bdd->query('SELECT * FROM sponsors');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
	

<Fieldset>
<legend> <h3> <?php echo $donnees['nom'] ?> </h3> </legend>
	<?php
	
	 $chemin= "../image_sponsor/".$donnees['photo'];
echo '<a href="'.$donnees['liens'].'"><img src="'.$chemin.'" alt="" /></a>'; 
 
?>
</Fieldset>
  <?php }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

?>
  
  <form method="post" action="envoie_sponsors.php" enctype= "multipart/form-data">
	<Fieldset>
	<legend> ajout d'un entraînement</legend>
		<p><label for="nom">Nom</label> : <input type="text" name="nom" id="nom"tabindex="40"size="60"/></p>
		pour ajouter le site internet, connecter vous sur le ite internet du sponsors et copier l'adresse du internet et coller la dans le champ suivant.
	<p><label for="nom">Site internet</label> :<input type="text" name="liens" id="liens"tabindex="50"  size="100"/></p>
	<p><label for="photo">Photo</label> :<input type="file" name="photo" /></p>
	<input type="Submit" value="ajouter" name="ajouter"/>
	</fieldset>
	</form>
	</div>

 

   </body>
 </html>