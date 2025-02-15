<?php

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$reponse = $bdd->query('SELECT * FROM accueil  WHERE page = \''.$_POST["page"].'\' LIMIT 1');


	$req = $bdd->prepare('UPDATE `accueil` SET `titre`=?,`texte`=? WHERE page=\''.$_POST["page"].'\'');
$req->execute(array(
	$_POST['titre'],
	$_POST['texte'],
	));
	header("Location: modif_accueil.php") 



?>