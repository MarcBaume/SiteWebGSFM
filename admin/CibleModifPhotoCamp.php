<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
if (isset($_FILES['photo'])) 
	{
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
	$req = $bdd->prepare('UPDATE `accueil` SET `photo`=? WHERE page=\''.$_POST["page"].'\'');
$req->execute(array(
	$photo
	));
	header("Location: modif_accueil.php") 
?>
