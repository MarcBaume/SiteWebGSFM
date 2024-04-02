<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>GSFM</title>
	<link rel="icon" href="gsfm.png" type="image/png" sizes="32x32">
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />
   </head>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">
<?php 
//vérification que le membre n'hexiste pas
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJunker', 'er3z4aet1234', $pdo_options);
  // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM camp ');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	//vérification que le nom d'utilisateur n'existe pas
    if ((($_POST['nom'])==($donnees['Nom']))and (($_POST['prenom'])==($donnees['Prenom']))and (($_POST['npa'])==($donnees['npa'])))
	{
	echo "inscription déjà existante , si vous ne comprenez pas votre porblème écrivez un mail à marcbaume2@gmail.com";
	exit;
	}
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
	
	//si le programme ne trouve pas de catégorie


//classement par catégorie

 $reponse = $bdd->query('SELECT * FROM categorie WHERE parcours=\''.$_POST["remarque"].'\'');
 while ($donnees = $reponse->fetch())
 {
 if((( $_POST['date'])>=($donnees['annee_debut'])) and ( $_POST['date'])<=($donnees['annee_fin']) and ( ($_POST['sexe'])==($donnees['sexe']) or ($donnees['sexe']=='Mixte')))
	{$categorie=$donnees['cat'];
	
	}

	}
		if ($categorie ==""){
	echo ("vous avez pas l'âge pour ce parcours, si vous ne comprenez pas votre porblème écrivez un mail à marcbaume2@gmail.com");
	exit;
	}
$reponse->closeCursor(); // Termine le traitement de la requête


//remplacement de l'abréviation du parcours par le nom

 $reponse = $bdd->query('SELECT * FROM parcours WHERE abreviation=\''.$_POST["remarque"].'\'');
 while ($donnees = $reponse->fetch())
 {
 $parcours=$donnees['nom'];
 }
 
$reponse->closeCursor(); // Termine le traitement de la requête
$nom=ucwords(strtolower($_POST['nom']));
  $localite= ucwords( strtolower($_POST['ville']));
if ($_POST['sponsors']<>"") {
$sponsors=1;
}
else
{
$sponsors=0;
}
//ajout inscription
try
{

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('INSERT INTO camp(Nom, Prenom, Date, mail, adresse, npa, localite, tel, sexe, remarque,categorie,club,sponsors) VALUES(?,?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?,?)');
	$req->execute(array(
	
	$nom,
	$_POST['prenom'],
	$_POST['date'],
	$_POST['email'],
	$_POST['adresse'],
	$_POST['zip'],
	$localite,
	$_POST['tel'],
	$_POST['sexe'],
	$parcours,
	$categorie,
	$_POST['club'],
	$sponsors,
	));

echo "votre inscription à été validée, veuillez vérifier si votre nom est inscrit dans la liste des athlètes inscrits sur le lien suivant: <a href='liste.php'>Liste des athlètes</a></br>si ce n'est pas le cas envoyer un mail à l'adresse suivant: marcbaume12@gmail.com";

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<?php 
     mail('info@gsfranches-montagnes.ch', "inscription".$post['ID'], 	$_POST['nom']."\n".$_POST['prenom']."\n"
	 .$_POST['date']."\n".$_POST['email']."\n".$_POST['adresse']."\n". $_POST['zip']."\n". $_POST['ville']."\n".$_POST['tel']."\n".$_POST['sexe']."\n".$_POST['remarque'] );

?> 
 <?php 
     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom'].$_POST['nom'] .","."\n".
	 "Votre inscription est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches ". 
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet 'liste.php' dans la liste des athlètes" );
?> 
</br>
 <?php include ("sponsors.php"); ?>
<?php include ("footer.php"); ?>

</div>
</body>
</html>



