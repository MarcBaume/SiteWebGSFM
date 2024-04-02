 <!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
<body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 
<Div id="corps">
<?php 


//ajout inscription
try
{
if (strlen($_POST['Nom_equipe']) > 0 ) 
{

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234',$pdo_options);  
	$req = $bdd->prepare('INSERT INTO equipe(Nom_equipe, email, Nom1, Prenom1, Nom2, Prenom2, Nom3, Prenom3) VALUES(?,?, ?, ?, ?, ?, ?, ?)');
	$req->execute(array(
	$_POST['Nom_equipe'],
	$_POST['email'],
	$_POST['Nom1'],
	$_POST['Prenom1'],
	$_POST['Nom2'],
	$_POST['Prenom2'],
	$_POST['Nom3'],
	$_POST['Prenom3'],
	));
	

	     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['Nom_equipe']."\n".
	 "Votre inscription par équipe est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches ". 
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des équipes" );

	 ?>
</br>
</br>
Votre inscription a été validée.
</br>
</br>
<?php
}
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

</br>
 <?php include ("sponsors.php"); ?>
<?php include ("footer.php"); ?>

</div>
</body>
</html>



