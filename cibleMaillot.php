 <!DOCTYPE html >
<html >
<?php include("head.php"); ?>
<body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<div id="corps">
<?php 
//vérification que le membre n'hexiste pas
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


//ajout inscription
try
{
if (strlen($_POST['prenom']) > 0 ) 
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('INSERT INTO Maillot(Nom, Prenom, Date, mail, Nombre, Sexe, Maillot, Short, Remarque) VALUES(?,?, ?,  ?, ?, ?, ?, ?, ?)');
	$req->execute(array(
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['date'],
	$_POST['email'],
	$_POST['Nombre'],
	$_POST['sexe'],
	$_POST['Maillot'],
	$_POST['Short'],
	$_POST['Remarque']
	));
	

     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom']." ".$_POST['nom'] .","."\n".
	 "Votre inscription est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches ". 
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des athlètes" );

	 ?> 

</br>
</br>
Votre commande a été validée
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



