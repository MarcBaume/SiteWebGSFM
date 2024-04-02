<?php

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$req = $bdd->prepare('INSERT INTO categorie(parcours,distance,annee_fin,annee_debut,cat,heure_depart,sexe,prix_internet,prix_place) VALUES(?,?,?,?,?,?,?,?,?)');
	$req->execute(array(
	$_POST['parcours'],
	$_POST['distance'],
$_POST['annee_fin'],
$_POST['annee_debut'],
$_POST['cat'],
$_POST['heure'],
$_POST['sexe'],
$_POST['prix_internet'],
$_POST['prix_place'],
	));
header('Location: modif_course.php');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
