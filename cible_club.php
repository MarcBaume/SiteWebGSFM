<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>GSFM</title>
	<link rel="icon" href="gsfm.png" type="image/png" sizes="32x32">
         <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />
   </head>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">
<?php 

//ajout inscription
try
{

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('INSERT INTO membre_club(Nom, Prenom,   Adresse, NPA, Localite,Date,Mail, Tel ) VALUES(?,?, ?, ?, ?, ?, ?, ?)');
	$req->execute(array(
	
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['adresse'],
		$_POST['zip'],
			$_POST['ville'],
	$_POST['date'],
	$_POST['email'],
	$_POST['tel']
	));

echo "votre inscription au club à été validée";

     mail('jolym53@gmail.com', "inscription_membre", 	$_POST['nom']."\n".$_POST['prenom']."\n"
	 .$_POST['date']."\n".$_POST['email']."\n".$_POST['adresse']."\n". $_POST['zip']."\n". $_POST['ville']."\n".$_POST['tel']."\n");


     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom'].$_POST['nom'] .","."\n".
	 "Votre inscription comme membre du club est enregistrée, le GS Franches-Montagnes vous souhaite plein de plaisir parmis nous ");

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



