<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">


<div id="int_corps">
<?PHP
    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
//	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234',$pdo_options);  
	

	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
		// On r�cup�re tout le contenu de la table parcours
    $reponse = $bdd->query('SELECT * FROM equipe ');?>

	
	<center>
	 <table> 
		<th width="5%"> N�</th>
		<th width="15%"> Nom �quipe</th>
		<th width="15%"> Nom 1 </th>
		<th width="5%"> Pr�nom 1</th>
		<th width="15%"> Nom 2</th>
		<th width="5%"> Pr�nom 2</th>
		<th width="15%"> Nom 3</th>
		<th width="25%"> Pr�nom 3</th>
	 <?php
	 $c=0;
    // On affiche chaque entr�e une � une
    while ($donnees = $reponse->fetch())
    {
	$c=$c+1;

	 ?>
	    
		<tr>
			<td > <?php echo $donnees['Nom_equipe']; ?></td>
			<td> <?php echo $donnees['Nom1']; ?>  </td>
			<td> <?php echo $donnees['Prenom1']; ?></td>
			<td><?php echo $donnees['Nom2']; ?> </td>
			<td ><?php echo $donnees['Prenom2']; ?> </td>
			<td><?php echo $donnees['Nom3']; ?> </td>
			<td ><?php echo $donnees['Prenom3']; ?> </td>
		</tr>
<?php
}
   

    $reponse->closeCursor(); // Termine le traitement de la requ�te


?>

</table>
 </center>
 </div>
 <?php include ("sponsors.php"); ?>
 <?php include ("footer.php"); ?>
 </div>



 </body>

</html>


 



