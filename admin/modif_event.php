
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
<center>
<table>
	<h3> Modification des évenements</h3>
			<th width="5%">Date </th>
		<th width="20%"> Nom</th>
		<th width="20%"> Lieu</th>
<form method="post" action="CibleDeleteEvent.php">
		<?php
try
{
    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On r�cup�re tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM Event_2');
    
    // On affiche chaque entr�e une � une
    while ($donnees = $reponse->fetch())
    {
    ?>
<tr>
	<td>
<?php
echo "<input type=\"radio\" name=\"num\"  value=\"".$donnees['id']."\">";
?>	
</td>	
		<td><?php echo $donnees['date']; ?> </td>
		<td><?php echo $donnees['nom'];?> </td>
		<td><?php echo $donnees['lieu'];?> </td>
</tr>
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requ�te
}
catch(Exception $e)
{
    // En cas d'erreur pr�c�demment, on affiche un message et on arr�te tout
    die('Erreur : '.$e->getMessage());
}
?>


</table>
</center>
<input type="submit" value="delete" />
</form>
<fieldset>
<legend> Ajout de nouvelle évenement</legend>
   <form method="post" action="CibleAddEvent.php">
   <p><label for="date">Date (jj.mm.aa)</label> : <input type="text" name="date" id="date" tabindex="5" /></p>
       <p><label for="nom">Nom </label> : <input type="text" name="nom" id="nom" tabindex="10" /></p>
	   <p><label for="lieu">Lieu</label> : <input type="text" name="lieu" id="lieu" tabindex="30" /></p>
       
<input type="submit" value="Ajouter" />
</fieldset>
</form>
	
  </div>
</html>

 
