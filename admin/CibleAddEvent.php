<?php

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$req = $bdd->prepare('INSERT INTO Event_2(date,nom,lieu) VALUES(?,?,?)');
	$req->execute(array(
	$_POST['date'],
$_POST['nom'],
$_POST['lieu'],
	));
header('Location: modif_event.php');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
