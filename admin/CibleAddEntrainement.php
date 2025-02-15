<?php
switch ($_POST['jour'])
{
case "Lundi":
$numero=1;
break;

case "Mardi":
 $numero=2;
break;
 case "Mercredi":
 $numero=3;
break;
 case "Jeudi":
 $numero=4;
 break;
  case "Vendredi":
 $numero=5;
 break;
  case "Samedi":
 $numero=6;
 break;
  case "Dimanche":
 $numero=7;
 break;
 }

 
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$req = $bdd->prepare('INSERT INTO Entrainement(num,jour, debut, fin, lieu, activite, remarque) VALUES(?,?, ?, ?, ?, ?, ?)');
$req->execute(array(
	$numero,
	$_POST['jour'],
	$_POST['debut'],
	$_POST['fin'],
	$_POST['lieu'], 
	$_POST['activite'],
	$_POST['remarque'],

	));
	
	
header('Location: modif_entrainement.php');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>