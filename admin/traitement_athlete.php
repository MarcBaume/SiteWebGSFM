<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />
   </head>
   <body>
   
<?php




if (isset($_FILES['photo'])) {
	$source = $_FILES['photo']['tmp_name'];
	$destination = '../images/'.$_FILES['photo']['name'];
	if($_FILES['photo']['name']>0) {
		die("erreur lors de la transmission du fichier");
	}
	if (!move_uploaded_file($source,$destination)) {
		die("erreur lors du déplacement du fichier");

	}
	$photo = $_FILES['photo']['name'];
}
else {
	$photo = '';
}

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$req = $bdd->prepare('INSERT INTO athlete_mois(nom, prenom, age, objectif_annee, objectif1, objectif2, sportif_pref, sportive_pref, remarque, photo) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array(
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['age'],
	$_POST['objectif_annee'], 
	$_POST['objectif1'],
	$_POST['objectif2'],
	$_POST['sportif_pref'],
	$_POST['sportive_pref'],
	$_POST['remarque'], 
	$photo
	));
echo 'athlète à été ajouté';

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

</body>