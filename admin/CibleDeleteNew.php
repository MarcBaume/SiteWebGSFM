
<?php

try
{
echo $_POST['supp'];

$supp= $_POST['supp'];
echo $supp;

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('DELETE FROM news WHERE ID=?');
	$req->execute(array(
	$_POST['supp'],
	));

header('Location: modif_news.php');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>


