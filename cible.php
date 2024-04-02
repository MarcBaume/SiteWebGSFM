<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>GSFM</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	     <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=yes">
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />

     <link rel="stylesheet" title="defaut" media="screen" href="style.css" type="text/css"/>
     <link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="style-mobil.css" />
 </head>
<script type="text/javascript">

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		carte_suisse_01_BE_over = newImage("images/carte_suisse_01-BE_over.jpg");
		carte_suisse_01_ju_over = newImage("images/carte_suisse_01-ju_over.jpg");
		carte_suisse_01_FR_over = newImage("images/carte_suisse_01-FR_over.jpg");
		carte_suisse_01_VD_over = newImage("images/carte_suisse_01-VD_over.jpg");
		carte_suisse_01_GE_over = newImage("images/carte_suisse_01-GE_over.jpg");
		carte_suisse_01_ne_over = newImage("images/carte_suisse_01-ne_over.jpg");
		preloadFlag = true;
	}
}


function checkForm(f) {

	
	f.submit();
	
}


</script>
</head>
<!-- End Preload Script -->
   <body>
   
  <?php include("onglets.php"); ?>
<?php include("menu_vertical.php"); ?>
<?php include("menu_horizontal.php"); ?>

<div id="corps">
<?php 
//vérification que le membre n'hexiste pas
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	//	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin'));
   // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM inscription ');
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

//ajout inscription
try
{
if (strlen($_POST['prenom']) > 0 ) 
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('INSERT INTO inscription(Nom, Prenom, Date, mail, adresse, npa, localite, tel, sexe, remarque,categorie,club) VALUES(?,?, ?,  ?, ?, ?, ?, ?, ?,?, ?,?)');
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
	));
	
     mail('inscription@juradefichrono.ch@gsfranches-montagnes.ch', "inscription".$post['ID'], 	$_POST['nom']."\n".$_POST['prenom']."\n"
	 .$_POST['date']."\n".$_POST['email']."\n".$_POST['adresse']."\n". $_POST['zip']."\n". $_POST['ville']."\n".$_POST['tel']."\n".$_POST['sexe']."\n".$_POST['remarque'] );


     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom']." ".$_POST['nom'] .","."\n".
	 "Votre inscription est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches ". 
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des athlètes" );

	 ?> 

</br>
</br>
Votre inscription a été validée, veuillez vérifier si votre nom est inscrit </br>dans la liste des athlètes inscrits sur le lien suivant: 
<a href='liste.php'>Liste des athlètes</a></br>Si ce n'est pas le cas, envoyez un mail à l'adresse suivante: marcbaume12@gmail.com
</br>
</br>
<?php
}
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

</br>
 <?php include ("sponsors.php"); ?>
<?php include ("footer.php"); ?>

</div>
</body>
</html>



