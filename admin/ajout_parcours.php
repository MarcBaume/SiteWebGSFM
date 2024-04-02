<?php
if (isset($_FILES['image_1'])) {
	$source = $_FILES['image_1']['tmp_name'];
	$destination = '../img_parcours/'.$_FILES['image_1']['name'];
	if($_FILES['image_1']['name']>0) {
		die("erreur lors de la transmission du fichier");
	}
	if (!move_uploaded_file($source,$destination)) {
		die("erreur lors du déplacement du fichier");

	}
	$image_1 = $_FILES['image_1']['name'];
}
else {
	$image_1 = '';
}
if (isset($_FILES['image_2'])) {
	$source = $_FILES['image_2']['tmp_name'];
	$destination = '../img_parcours/'.$_FILES['image_2']['name'];
	if($_FILES['image_2']['name']>0) {
		die("erreur lors de la transmission du fichier");
	}
	if (!move_uploaded_file($source,$destination)) {
		die("erreur lors du déplacement du fichier");

	}
	$image_2 = $_FILES['image_2']['name'];
}
else {
	$image_2 = '';
}


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$req = $bdd->prepare('INSERT INTO sponsors(nom, liens, photo) VALUES(?, ?, ?)');
	$req->execute(array(
	
	$_POST['nom'],
	$_POST['liens'],
	$image_2	
));



?>