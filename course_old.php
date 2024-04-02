 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
 <link rel="icon" href="gsfm.png" type="image/png" sizes="32x32">
       <title>Course des franches</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta property="og:description" content="course des franches, course, jura, franches-montagnes, le noirmont, course à pied, gsfm, groupe sportif" />  
<meta property="og:image" content="/images/image_fb.jpg" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />
   </head>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?>   

<Div id="corps">
<?php include("news.php"); ?>   

   <li><a href="liste.php">Liste des inscrits</a></li> </p>
    <li><a href="formulaire.php">Inscriptions</a></li> </p>
  <?php
	 
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);

    // On récupère  une valeur aléatoire dans la base de donné
    $reponse = $bdd->query('SELECT * FROM accueil  WHERE page = \'course\'LIMIT 1');
    // On affiche chaque entrée une à une
     $donnees = $reponse->fetch();
	  $texte= nl2br($donnees['texte']);
    ?>


	<h2>
         <?php echo  $donnees['titre']; ?> 	</h2>	
  
 <a href="images/affiche.JPG"  class="lightbox"><img src="images/flyer_cf.jpg" WIDTH=650px
 HEIGHT=90% alt=""<alt="Photo " title="Cliquez pour agrandir" /></a>
 

  <H3> Les parcours de la course des Franches</h3>
   <ul id="formulaire">
   
   <center>
  <a href="images/grand_parcours.JPG" class="lightbox"><img src="images/grand_parcours.jpg"  WIDTH=650px
 HEIGHT=90% alt=""<alt="Photo " title="Cliquez pour agrandir" /></a>
 </center>
 

 
    <?php

    $reponse->closeCursor(); // Termine le traitement de la requête
	
	    $reponse = $bdd->query('SELECT * FROM categorie ORDER BY cat ASC');?>
	
	<center>
		<table width="70%">
		<th width="20%"> année de naissance</th>
		<th width="20%"> parcours</th>
		<th width="15%"> catégorie</th>
		<th width="15%"> distance</th>
		<th width="15%"> heure départ</th>
		<th width="10%"> prix par internet</th>
		<th width="10%"> prix sur place</th>
		
	<tr>
	<?php
    while ($donnees = $reponse->fetch())
    {
	IF  ($donnees['sexe'] =="Homme") {
	 ?>
	
	<!-- il faut créer des form dans la boucle while pour pouvoir créer un bouton supprimer qui va supprimer la bonne valeur du champ cacher et non la dernière -->
 
	<td style="background-color: #18D0D0;"> <?php echo $donnees['annee_debut'] ."-". $donnees['annee_fin'] ?>  </td>
	<td style="background-color: #18D0D0;">  <?php echo $donnees['parcours']; ?></td> 
    <td style="background-color: #18D0D0;">  <?php echo $donnees['cat']; ?></td> 
	<td style="background-color: #18D0D0;">	<?php echo $donnees['distance'];?> </td>
	<td style="background-color: #18D0D0;">  <?php echo $donnees['heure_depart']; ?></td> 
	<td style="background-color: #18D0D0;">	<?php echo $donnees['prix_internet'];?> </td>
	<td style="background-color: #18D0D0;">	<?php echo $donnees['prix_place'];?> </td>
	</tr>


      <?php
	}
	IF  ($donnees['sexe'] =="Femme") {
	 ?>
	
	<!-- il faut créer des form dans la boucle while pour pouvoir créer un bouton supprimer qui va supprimer la bonne valeur du champ cacher et non la dernière -->
 
	<td style="background-color: #FFD0D0;"> <?php echo $donnees['annee_debut'] ."-". $donnees['annee_fin'] ?>  </td>
	<td style="background-color:#FFD0D0;">  <?php echo $donnees['parcours']; ?></td> 
    <td style="background-color: #FFD0D0;">  <?php echo $donnees['cat']; ?></td> 
	<td style="background-color: #FFD0D0;">	<?php echo $donnees['distance'];?> </td>
	<td style="background-color: #FFD0D0;">  <?php echo $donnees['heure_depart']; ?></td> 
	<td style="background-color: #FFD0D0;">	<?php echo $donnees['prix_internet'];?> </td>
	<td style="background-color: #FFD0D0;">	<?php echo $donnees['prix_place'];?> </td>
	</tr><?php
    }
	IF  ($donnees['sexe'] =="Mixte") {
	 ?>
	
	<!-- il faut créer des form dans la boucle while pour pouvoir créer un bouton supprimer qui va supprimer la bonne valeur du champ cacher et non la dernière -->
 
	<td style="background-color: #5CEE0C;"> <?php echo $donnees['annee_debut'] ."-". $donnees['annee_fin'] ?>  </td>
	<td style="background-color: #5CEE0C;">  <?php echo $donnees['parcours']; ?></td> 
    <td style="background-color: #5CEE0C;">  <?php echo $donnees['cat']; ?></td> 
	<td style="background-color: #5CEE0C;">	<?php echo $donnees['distance'];?> </td>
	<td style="background-color: #5CEE0C;">  <?php echo $donnees['heure_depart']; ?></td> 
	<td style="background-color: #5CEE0C;">	<?php echo $donnees['prix_internet'];?> </td>
	<td style="background-color: #5CEE0C;">	<?php echo $donnees['prix_place'];?> </td>
	</tr><?php
    }
	}?>
    </table>
	</center>
	
	<?php
	
    $reponse->closeCursor(); // Termine le traitement de la requête


}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>

 <?php include ("sponsors.php"); ?>
<?php include ("footer.php"); ?>

</div>
</body>
</html>