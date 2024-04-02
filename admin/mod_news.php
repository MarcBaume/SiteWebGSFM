
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
 <meta charset="utf-8"/>
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
   </head>
  
 <?php include("en_tete.php"); ?> 
 <?php include("menu_admin.php"); ?> 



<div id="corps">
	
	<fieldset>
	<legend> Suppression de news </legend>
	<center>
    <table>
	  <?php
	 
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM news');

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	
    ?>
		<tr>
			<form method="post" action="delete_news.php">


	<!-- ajout d'une cellule cacher avec la valeur de la catégorie -->
	<td style="border:0px"align="left" valign="middle"><?php echo "<input type=\"hidden\"  name=\"supp\"value=\"".$donnees['ID']."\">";
	// ajout d'une du bouton supprimer de type image 
	echo "<input type=\"image\" src=\"images/delete.JPG\" title=\"delete\"width=\"30\" height=\"30\">";?>
	
	</td>
</form>
	<td>

	<?php echo $donnees['date']; ?>  
		
	</td><td>
        <?php echo $donnees['text']; ?> 
	
	</td>
	
	</tr>
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
</table>
</center>
</fieldset>

<fieldset>
<legend> Ajout d'une nouvelle news </legend>
   <form method="post" action="traitement.php">
       
       <textarea name="text" rows="8" cols="32" id="text" tabindex="80"></textarea><br/>
	   <p><label for="text">Auteur</label> : <input type="text" name="Auteur" id="Auteur"tabindex="90"/></p>
	   
	<input type="submit" />
</fieldset>
</form>


</div>
</html>