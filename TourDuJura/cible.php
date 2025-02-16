<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


<div id="info">
<Center>
	<img src="images/LogoTourDuJura.jpg" width="70%" alt=""  align="center"  />
</center>

<!-- End Preload Script -->
   <body>
<?
    // On se connecte à MySQL
 $con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else
  {
  
  mysqli_select_db($con ,'dxvv_jurachrono' );
}
  
//ajout inscription
try
{
if (strlen($_POST['prenom']) > 0 ) 
{
$Nom=ucwords(strtolower($_POST['nom']));
$localite= ucwords( strtolower($_POST['ville']));

if($_POST['Parcours1'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours1'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}

if($_POST['Parcours2'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours2'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours3'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours3'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours4'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours4'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours5'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours5'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours6'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours6'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours7'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours7'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours8'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours8'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours9'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours9'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours10'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours10'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours11'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours11'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours12'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	("'.$Nom.'", 
	
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours12'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours13'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours13'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours14'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours14'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours15'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours15'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours16'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours16'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours17'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours17'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours18'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours18'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours19'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours19'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours20'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours20'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours21'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours21'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours22'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours22'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours23'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours23'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours24'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours24'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours25'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours25'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours26'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours26'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
if($_POST['Parcours27'] >0)
{
$sql = 'INSERT INTO TourDuJura (`Nom`, `Prenom`, `Localite`,`Annee`,`Telephone`,`Remarques`, `email`,`IDParcours`)
 VALUES
	(
	"'.$Nom.'", 
	"'.$_POST['prenom'].'", 
	"'.$localite.'", 
	"'.$_POST['date'].'",
	"'.$_POST['Telephone'].'",	
	"'.$_POST['Remarque'].'", 
	"'.$_POST['email'].'", 
	"'.$_POST['Parcours27'].'");';
	if (mysqli_query($con,$sql))
  {
;
  }
else
  {
  echo "Error insert : Informations" . mysql_error();
  }  
}
mysqli_close($con);

	

     mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom']." ".$_POST['Nom'] .","."\n".
	 "Votre inscription est enregistrée, le Jura défi Chrono vous souhaite une bonne Course au Tour du Jura  ".
	 "\n"."Vous pouvez consulter votre inscription sur la liste des points de passage" );
	 ?> 

</br>
</br>

Votre inscription a été validée, veuillez vérifier si votre Nom est inscrit. </br>
dans la liste des athlètes inscrits si il ne se trouve pas dans l'heure qui suis, envoyez un mail à l'adresse suivante: marcbaume12@gmail.com
 </br>
 </br>
 
 <li>
 <a href="index2021.php">Retour page accueil</a>
 </li>
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

<p class="titleCenter">Partenaire </p>
<fieldset>
<table width="100%">
<tr>
<td>
<center>
	<img src="images/logo_GSFM.jpg" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/bfm.jpg" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/mulebar.png" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/lepays.png" height="60px" alt="" align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/Miserez.png" height="80px" alt="" align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/mobiliere.jpg" height="80px" alt="" align="center"  />
</center>
</td>
</tr>
</TABLE>
</fieldset>
</div>
</div>
</body>
</html>



