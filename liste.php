﻿<!DOCTYPE html >
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
?>    
			
  <form method="post" action="liste.php">
			<?php
			// On récupère tout le contenu de la table parcours
    $reponse = $bdd->query('SELECT * FROM parcours ');?>
	<p> <label for="parcours">Trier par parcours    </label><select name="parcours">
	<option value="">tous les parcours</option>
	
	<?php
	  while ($donnees = $reponse->fetch())
    {
	   echo "<option value=\"".$donnees['nom']."\">\"".$donnees['nom']."\"</option>";
	}
	?>
	 </p>
	</select>
	<input type="submit" value="trier">
	</form>
	<?php
	    $reponse->closeCursor(); // Termine le traitement de la requête
		


    
    // On récupère tout le contenu de la table camp
	if ($_POST['parcours']==("")){
    $reponse = $bdd->query('SELECT * FROM inscription ORDER BY nom ASC');
	}
	else{
	 $reponse = $bdd->query('SELECT * FROM inscription  WHERE remarque=\''.$_POST["parcours"].'\' ORDER BY nom ASC');}
    ?>
	<center>
	 <table> 
		<th width="5%"> N°</th>
		<th width="15%"> Nom</th>
		<th width="15%"> Prénom</th>
		<th width="5%"> Date</th>
		<th width="15%"> Localité</th>
		<th width="5%"> Sexe</th>
		<th width="15%"> équipe / entreprise</th>
		<th width="25%"> Parcours</th>
	<!---<th width="25%"> Catégorie</th> --->
	 <?php
	 $c=0;
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	$c=$c+1;
	IF  (($donnees['sexe'] =="H") or ($donnees['sexe'] =="Homme")) {
	 ?>
	    
		<tr>
			<td  style="background-color: #80FFFF;" width="5%" >  <?php echo $c; ?></td>
			<td  style="background-color: #80FFFF;"width="15%"> <?php echo $donnees['Nom']; ?></td>
			<td style="background-color: #80FFFF;"width="15%"> <?php echo $donnees['Prenom']; ?>  </td>
			<td style="background-color: #80FFFF;"width="5%"> <?php echo $donnees['Date']; ?></td>
			<td style="background-color: #80FFFF;"width="15%"><?php echo $donnees['localite']; ?> </td>
			<td style="background-color: #80FFFF;"width="5%">H </td>
			<td style="background-color: #80FFFF;"width="15%"><?php echo $donnees['equipe']; ?> </td>
			<td style="background-color: #80FFFF;"width="25%"><?php echo $donnees['remarque']; ?> </td>
<!---			<td style="background-color: #80FFFF;"width="25%"><?php// echo $donnees['categorie']; ?> </td>--->
		</tr>

   <?php
   }
   
else
{
?>

		<tr>
			<td  style="background-color: #FFD0D0;" width="5%" >  <?php echo $c; ?></td>
			<td  style="background-color: #FFD0D0;"width="15%"> <?php echo $donnees['Nom']; ?></td>
			<td style="background-color: #FFD0D0;"width="15%"> <?php echo $donnees['Prenom']; ?>  </td>
			<td style="background-color: #FFD0D0;"width="5%"> <?php echo $donnees['Date']; ?></td>
			<td style="background-color: #FFD0D0;"width="15%"><?php echo $donnees['localite']; ?> </td>
			<td style="background-color: #FFD0D0;"width="5%">D </td>
			<td style="background-color: #FFD0D0;"width="15%"><?php echo $donnees['equipe']; ?> </td>
			<td style="background-color: #FFD0D0;"width="25%"><?php echo $donnees['remarque']; ?> </td>
	<!---		<td style="background-color: #FFD0D0;"width="25%"><?php //echo $donnees['categorie']; ?> </td>--->
		</tr>

  <?php
}
   
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


 



