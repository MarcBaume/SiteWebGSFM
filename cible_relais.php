 <!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
<body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 
<Div id="corps">
<?php 

$nom=ucwords(strtolower($_POST['nom']));
  $localite= ucwords( strtolower($_POST['ville']));
  $nom2=ucwords(strtolower($_POST['nom2']));
  $localite2= ucwords( strtolower($_POST['ville2']));
  $nom3=ucwords(strtolower($_POST['nom3']));
  $localite3= ucwords( strtolower($_POST['ville3']));

//ajout inscription
try
{
if ($_POST['prenom']<>"") {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$req = $bdd->prepare('INSERT INTO relais(equipe, Nom, prenom, date, mail, adresse, npa, localite, tel,club,pays, sexe, Nom2 , prenom2 , date2,mail2, adresse2,npa2,localite2, pays2,sexe2,Nom3,prenom3,date3,mail3,adresse3, npa3,localite3,pays3,sexe3)	VALUES(	?,?, ?, ?, ?, ?, ?, ?, ?,?,	?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?, ?, ?, ?,	?, ?, ?, ?, ?)');
	$req->execute(array(
	$_POST['Nom_equipe'],
	$nom,
	$_POST['prenom'],
	$_POST['date'],
	$_POST['email'],
	$_POST['adresse'],
	$_POST['zip'],
	$localite,
	$_POST['tel'],
		$_POST['club'],	
			$_POST['pays'],
	$_POST['sexe'],
		$nom2,
	$_POST['prenom2'],
	$_POST['date2'],
	$_POST['email2'],
	$_POST['adresse2'],
	$_POST['zip2'],
	$localite2,
		$_POST['pays2'],
	$_POST['sexe2'],
		$nom3,
	$_POST['prenom3'],
	$_POST['date3'],
	$_POST['email3'],
	$_POST['adresse3'],
	$_POST['zip3'],
	$localite3,
		$_POST['pays3'],
	$_POST['sexe3']
	));
}
?>
</br>
</br>
Votre inscription a été validée, veuillez vérifier si votre nom est inscrit </br>dans la liste des athlètes inscrits sur le lien suivant: 
<a href='liste_relais.php'>Liste des relais</a></br>Si ce n'est pas le cas, envoyez un mail à l'adresse suivante: marcbaume12@gmail.com
</br>
</br>
<?php
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<?php 
if ($_POST['prenom']<>"") {
     mail('inscription@juradefichrono.ch', "inscription".$post['ID'], 	$_POST['nom']."\n".$_POST['prenom']."\n"
	 .$_POST['date']."\n".$_POST['email']."\n".$_POST['adresse']."\n". $_POST['zip']."\n". $_POST['ville']."\n".$_POST['tel']."\n".$_POST['sexe']."\n".$_POST['remarque'] );
          }
?> 
 <?php 
     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom']." ".$_POST['Nom'] .","."\n".
	 "Votre inscription relais  est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches \n Informations: \n ". 
	 
	 
	 	$_POST['Nom_equipe']."\n ". 
	$nom."\n ". 
	$_POST['prenom']."\n ". 
	$_POST['date']."\n ". 
	$_POST['email']."\n ". 
	$_POST['adresse']."\n ". 
	$_POST['zip']."\n ". 
	$localite."\n ". 
	$_POST['tel']."\n ". 
		$_POST['club']."\n ". 	
			$_POST['pays']."\n ". 
	$_POST['sexe']."\n ". 
	
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des relais" );
	 
	    mail($_POST['email2'], 'Confirmation site web', "Bonjour ".$_POST['prenom2']." ".$_POST['Nom2'] .","."\n".
	 "Votre inscription relais  est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches \n Informations: \n ". 
	 
	 
	 	$_POST['Nom_equipe']."\n ". 
	$nom2."\n ". 
	$_POST['prenom2']."\n ". 
	$_POST['date2']."\n ". 
	$_POST['email2']."\n ". 
	$_POST['adresse2']."\n ". 
	$_POST['zip2']."\n ". 
	$localite2."\n ". 
			$_POST['pays2']."\n ". 
	$_POST['sexe2']."\n ". 
	
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des relais" );
	 
	 if ($_POST['email3'] != "")
	 {
	    mail($_POST['email3'], 'Confirmation site web', "Bonjour ".$_POST['prenom3']." ".$_POST['Nom3'] .","."\n".
	 "Votre inscription relais  est enregistrée, le GS Franches-Montagnes vous souhaite une bonne Course des Franches \n Informations: \n ". 
	 
	 
	 	$_POST['Nom_equipe']."\n ". 
	$nom3."\n ". 
	$_POST['prenom3']."\n ". 
	$_POST['date3']."\n ". 
	$_POST['email3']."\n ". 
	$_POST['adresse3']."\n ". 
	$_POST['zip3']."\n ". 
	$localite3."\n ". 	
			$_POST['pays3']."\n ". 
	$_POST['sexe3']."\n ". 
	
	 "\n"."Vous pouvez consulter votre inscription sur notre site internet dans la liste des relais" );
	 }
	 
?> 
</br>
 <?php include ("sponsors.php"); ?>
<?php include ("footer.php"); ?>

</div>
</body>
</html>



