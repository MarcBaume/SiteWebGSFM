
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
	
	<fieldset>
	<legend> Sondage CF2012</legend>
	<center>
    <table>
	  <?php
	 
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM sondage');

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	
    ?>
		<tr>
	<td>

	<?php echo $donnees['avis']; ?>  
		
	</td><td>
        <?php echo $donnees['remarque']; ?> 
	
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

</div>
</html>