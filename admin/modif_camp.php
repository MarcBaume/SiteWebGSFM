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
    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On r�cup�re  une valeur al�atoire dans la base de donn�
    $reponse = $bdd->query('SELECT * FROM accueil  WHERE page = \'camp\' LIMIT 1');
    // On affiche chaque entr�e une � une
     $donnees = $reponse->fetch();
	  $titre= nl2br($donnees['titre']);
	 $texte= nl2br($donnees['texte']);
    ?>


	<h2>
         <?php echo  $titre; ?> 	</h2>	
    <p>  <?php echo $texte; ?>   </p>
		<?php $chemin= "../images/".$donnees['photo'];?>
        <?php echo 

 '	 <a href="'.$chemin.'" class="lightbox"><img src="'.$chemin.'"  WIDTH=60%
 HEIGHT=60% alt=""/></a>'; 

	?>

    <?php

    $reponse->closeCursor(); // Termine le traitement de la requ�te

}
catch(Exception $e)
{
    // En cas d'erreur pr�c�demment, on affiche un message et on arr�te tout
    die('Erreur : '.$e->getMessage());
}

?>

   <form method="post" action="CibleModifCamp.php" enctype= "multipart/form-data">
	<Fieldset>
	<legend> Modification page camp</legend>
	<input type="hidden" name="page" value="camp"/>

	<p><label for="nom">Titre</label> : <textarea name="titre" id="titre"tabindex="50" rows="4" cols="80"   ><?php echo($donnees['titre']);?></textarea><br/><br/>
	
	<p><label for="nom">Texte</label> : <textarea name="texte" id="texte"tabindex="60" rows="20" cols="80"  ><?php echo($donnees['texte']);?></textarea><br/><br/>
	
	<input TYPE="image" src="images/mod.JPG"title="modifier" />
	</form>
	
	
	<form method="post" action="CibleModifPhotoCamp.php" enctype= "multipart/form-data">
	<input type="hidden" name="page" value="camp"/>
		<label for="photo">photo:</label><input type="file"  name='photo' />
		<input TYPE="image" src="images/mod.JPG"title="modifier" />
	</fieldset>
	</form>
	
</div>

 

   </body>
 </html>
 