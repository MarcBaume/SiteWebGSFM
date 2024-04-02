<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
<body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 
<Div id="corps">
<?php 

if (strlen($_POST['nom']) > 0 ) 
{
$nom=ucwords(strtolower($_POST['nom']));
 $prenom =ucwords( strtolower($_POST['prenom']));
  $localite= ucwords( strtolower($_POST['localite']));

//ajout inscription
try
{

  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	//$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);

	$req = $bdd->prepare('INSERT INTO camp_tenero(Nom, Prenom, Date, mail, adresse, npa, localite, tel ) VALUES(?, ?, ?, ?, ?,?, ?,?)');
	$req->execute(array(
	
	$nom,
	$prenom,
	$_POST['date'],
	$_POST['mail'],
	$_POST['adresse'],
	$_POST['npa'],
	$localite,
	$_POST['tel'],

	));

	echo 'votre inscription à été valider';
	
     mail('inscription@juradefichrono.ch', "camp".$post['nom'], 	$_POST['nom']."\n".$_POST['prenom']."\n"
	 .$_POST['date']."\n".$_POST['mail']."\n".$_POST['adresse']."\n". $_POST['npa']."\n". $_POST['localite']."\n".$_POST['tel']."\n" );

     mail($_POST['mail'], 'Confirmation site web', "Bonjour,".$_POST['prenom']." ".$_POST['nom']." " . "\n"."\n".
	 "Votre inscription au camp ténéro est enregistrée" );
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
}
?>



</div>
    </body>
</html>
 


   </body>
</html>



-