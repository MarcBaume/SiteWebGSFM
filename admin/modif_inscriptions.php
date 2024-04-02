
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>GSFM</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
   </head>
 <?php include("en_tete.php"); ?> 
 <?php include("menu_admin.php"); ?> 

<div id="corps">
   <form method="post" action="excel.php">
   <input type="submit" value="excel">
   </form>

<table>
	<h3> Modification athlètes</h3>
			<th width="5%"> </th>
	<th width="5%"> N°</th>
		<th width="10%"> Nom</th>
		<th width="10%"> Prénom</th>
		<th width="5%"> Date</th>
		<th width="15%"> mail</th>
		<th width="15%"> Adresse</th>
		<th width="3%"> NPA</th>
		<th width="10%"> Localité</th>
		<th width="2%"> Sexe</th>
		<th width="10%"> Club</th>
		<th width="20%"> Parcours</th>
<?php

try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video
 //   $reponse = $bdd->query('SELECT * FROM camp ORDER BY nom ASC');
$reponse = $bdd->query('SELECT * FROM camp');

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	$i=$i+1 // incrément pour tableau
    ?>
<tr>
	<td>
<?php
echo "<input type=\"radio\" name=\"check\"  value=\"".$donnees['ID']."\">";

	IF  ($donnees['sexe'] =="Homme") {
	 ?>
	    
	
			<td  style="background-color: #18D0D0;" width="5%" >  <?php echo $i; ?></td>
			<td  style="background-color: #18D0D0;"width="10%"> <?php echo $donnees['Nom']; ?></td>
			<td style="background-color: #18D0D0;"width="10%"> <?php echo $donnees['Prenom']; ?>  </td>
			<td style="background-color: #18D0D0;"width="5%"> <?php echo $donnees['Date']; ?>  </td>
			<td style="background-color: #18D0D0;"width="15%"> <?php echo $donnees['mail']; ?></td>
			<td style="background-color: #18D0D0;"width="15%"><?php echo $donnees['adresse']; ?> </td>
			<td style="background-color: #18D0D0;"width="3%"><?php echo $donnees['npa']; ?> </td>
			<td style="background-color: #18D0D0;"width="10%"><?php echo $donnees['localite']; ?> </td>
			<td style="background-color: #18D0D0;"width="2%">H </td>
			<td style="background-color: #18D0D0;"width="10%"><?php echo $donnees['club']; ?> </td>
			<td style="background-color: #18D0D0;"width="20%"><?php echo $donnees['remarque']; ?> </td>
		</tr>

   <?php
   }
   
else
{
?>

		
			<td  style="background-color: #FFD0D0;" width="5%" >  <?php echo $i; ?></td>
			<td  style="background-color: #FFD0D0;"width="10%"> <?php echo $donnees['Nom']; ?></td>
			<td style="background-color: #FFD0D0;"width="10%"> <?php echo $donnees['Prenom']; ?>  </td>
			<td style="background-color: #FFD0D0;"width="5%"> <?php echo $donnees['Date']; ?>  </td>
			<td style="background-color: #FFD0D0;"width="15%"> <?php echo $donnees['mail']; ?></td>
			<td style="background-color: #FFD0D0;"width="15%"> <?php echo $donnees['adresse']; ?></td>
			<td style="background-color: #FFD0D0;"width="3%"> <?php echo $donnees['npa']; ?></td>
			<td style="background-color: #FFD0D0;"width="10%"><?php echo $donnees['localite']; ?> </td>
			<td style="background-color: #FFD0D0;"width="2%">F </td>
			<td style="background-color: #FFD0D0;"width="10%"><?php echo $donnees['club']; ?> </td>
			<td style="background-color: #FFD0D0;"width="20%"><?php echo $donnees['remarque']; ?> </td>
		</tr>

  <?php
}


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
	
  
</script>





	
  </div>


 
