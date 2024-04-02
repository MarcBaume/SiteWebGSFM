<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>liste</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />

	</head>
	<script type="text/javascript">
	function quitter(){
		<?php

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('DROP DATABASE'.$_POST['nom']);
	
 //	$con = mysql_connect('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
//	$query=mysql_query('DROP DATABASE'.$_POST['nom'],$con);
//	mysql_query($con);
  //  mysql_close($con);
	?>
	alert("Merci d'indiquer un numéro de téléphone pour vous contacter si besoin");}
	</script>
    <body onbeforeunload="quitter();">>
	
	<?php //création d'une base de donnée au nom de la course
//	$con = mysql_connect('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE ".$_POST['nom'],$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create table de donnée du nom de parcours
mysql_select_db($_POST['nom'], $con);
$sql = "CREATE TABLE parcours
(
nom varchar(100),
prenom varchar(15),

Age int
)";

// Execute query
mysql_query($sql,$con);

mysql_close($con);

//ajout d'un dossier avec le nom de la course
mkdir($_POST['nom']);
	


?>

	
	
  <?php include("onglets.php"); ?>
<?php include("menu_vertical.php"); ?>
<?php include("menu_horizontal.php"); ?>
<div id="corps">
<ul id="step">
<fieldset>

<legend> étape 2 /les parcours </legend>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
 <p><label for="Nom">Abréviation:</label> <input type="text" name="abreviation" id="abreviation" tabindex="10" /></p>
  <p><label for="Nom">Nom:</label> <input type="text" name="nom" id="nom" tabindex="20" /></p>
  <p><label for="Nom">Distance:</label> <input type="text" name="distance" id="distance" tabindex="24" /></p>
  <p><label for="nom">Informations:</label> <textarea name="information" id="information"tabindex="25" rows="4" cols="80"   ></textarea></p>
  <p><label for="photo">Carte du parcours:</label><input type="file"  name='image_1' /></p>
  <p><label for="photo">Profil de dénivellation:</label><input type="file"  name='image_2' /></p>
  <center>
  <input type="image" src="images/bouton_plus.png" title="previous" style="background-color:transparent"width="50" height="50">
  </center>
</form>

</fieldset>

</ul>
 <center>

<input type="image" src="images/bouton_previous.png" title="previous" style="background-color:transparent"width="50" height="50">
<input type="image" src="images/bouton_next.png" title="next" style="background-color:transparent"width="50" height="50">
</form>
</center>
</div>
   </body>
   </html>