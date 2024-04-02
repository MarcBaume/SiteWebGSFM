<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">


<div id="int_corps">
<?PHP
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	//$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
		
    // On récupère tout le contenu de la table camp

    $reponse = $bdd->query('SELECT * FROM relais ORDER BY Nom ASC');
	?>
	<center>
	 <table> 
		<th width="5%"> N°</th>
		<th width="15%"> Equipe</th>
		<th width="15%"> Nom</th>
		<th width="15%"> Prénom</th>
		<th width="15%"> Nom 2</th>
		<th width="15%"> Prénom 2</th>
		<th width="15%"> Nom 3</th>
		<th width="15%"> Prénom 3</th>
	 <?php
	 $c=0;
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	$c=$c+1;
	?>
	    
		<tr>
			<td style="background-color: #dddddd;" width="5%" >  <?php echo $c; ?></td>
			<td  style="background-color: #dddddd;" width="15%"> <?php echo $donnees['equipe']; ?></td>
			<td style="background-color: #dddddd;" width="15%"> <?php echo $donnees['Nom']; ?></td>
			<td style="background-color: #dddddd;"width="15%"> <?php echo $donnees['prenom']; ?>  </td>
			<td  style="background-color: #dddddd;" width="15%"> <?php echo $donnees['Nom2']; ?></td>
			<td style="background-color: #dddddd;" width="15%"> <?php echo $donnees['prenom2']; ?>  </td>
			<td style="background-color: #dddddd;" width="15%"> <?php echo $donnees['Nom3']; ?></td>
			<td  style="background-color: #dddddd;" width="15%"> <?php echo $donnees['prenom3']; ?>  </td>	
		</tr>

   <?php
   }

    $reponse->closeCursor(); // Termine le traitement de la requête


?>

</table>
 </center>
 </div>
 <?php include ("sponsors.php"); ?>
 <?php include ("footer.php"); ?>
 </div>



 </body>

</html>


 



