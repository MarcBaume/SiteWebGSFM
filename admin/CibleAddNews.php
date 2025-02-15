 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
		   <meta charset="utf-8"/>
   </head>
   <body>
          	<?php $text= $_POST['text']; ?>	
			
<?php include("en_tete.php"); ?> 
<?php include("menu_admin.php"); ?>    


<div id="corps">
<?php

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$req = $bdd->prepare('INSERT INTO news(text,Auteur,date) VALUES(?,?,now())');
	$req->execute(array(
	$_POST['text'],
$_POST['Auteur'],
	));

echo 'une nouvelle news est ajoutée';

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<a href="modif_news.php">Retour</a>
</div>
    </body>
</html>
 