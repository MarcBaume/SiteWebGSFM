<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>liste</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style_admin.css" />

	</head>
    <body>
    <?php include("en_tete.php"); ?> 
<?php include("menu_admin.php"); 

    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	//$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));
?>    

			<div id="corps">

	<?php

    // On r�cup�re tout le contenu de la table camp
	
    $reponse = $bdd->query('SELECT * FROM camp_tenero ORDER BY nom ASC');

    ?>
	<center>
	 <table> 

		<th width="10%"> Nom</th>
		<th width="10%"> Pr�nom</th>
		<th width="5%"> Date</th>
		<th width="10%"> Mail</th>
		<th width="15%"> Adresse</th>
		<th width="5%"> NPA</th>
		<th width="10%"> Localit�</th>
			<th width="10%"> T�l�phone</th>
	

	 <?php
    // On affiche chaque entr�e une � une
    while ($donnees = $reponse->fetch())
    {
	
?>

		<tr>
			<td  style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"> <?php echo $donnees['Nom']; ?></td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"> <?php echo $donnees['Prenom']; ?>  </td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="5%"> <?php echo $donnees['Date']; ?></td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"><?php echo $donnees['mail']; ?> </td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"><?php echo $donnees['adresse']; ?> </td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"><?php echo $donnees['npa']; ?> </td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"><?php echo $donnees['localite']; ?> </td>
			<td style=" background-color: rgba(0, 0, 255, 0.5);"width="15%"><?php echo $donnees['tel']; ?> </td>

		</tr>

  <?php } 
  $reponse->closeCursor(); // Termine le traitement de la requ�te ?>

</table>
 </center>
 </div>


    </body>

</html>

