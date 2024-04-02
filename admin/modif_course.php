<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
   </head>
  
 <?php include("en_tete.php"); ?> 
 <?php include("menu_admin.php"); ?> 
<div id="corps">
	  <?php 
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJunker', 'er3z4aet1234', $pdo_options);

    // On récupère  les valeurs de la ligne du nom de course qui se situe dans la colonne page de la base de données accueil
    $reponse = $bdd->query('SELECT * FROM accueil  WHERE page = \'course\' LIMIT 1');
    // On affiche chaque entrée une à une
     $donnees = $reponse->fetch();
	 // il faut utiliser la fonction nl2br pour afficher du text sans les valeur </br> tandis que si on l'affiche dans un champ de type texte area il ne faut pas utiliser cette fonction
	 $titre2=$donnees['titre'];
	 $texte2=$donnees['texte'];
	 $titre= nl2br($donnees['titre']);
	 $texte= nl2br($donnees['texte']);
    ?>

	<h2>
         <?php echo  $titre; ?> 	</h2>	
    <p>  <?php echo $texte; ?>   </p>

    <?php

    $reponse->closeCursor(); // Termine le traitement de la requête
    $reponse = $bdd->query('SELECT * FROM categorie ');?>
	
	<center>
		<table width="50%">
		<th width="10%"> parcours</th>
		<th width="10%"> année début</th>
		<th width="10%"> année fin</th>
		<th width="15%"> catégorie</th>
		<th width="15%"> distance</th>
		<th width="15%"> heure départ</th>
		<th width="15%"> sexe</th>
		<th width="10%"> prix par internet</th>
		<th width="10%"> prix sur place</th>
		
	<tr>
	<?php
    while ($donnees = $reponse->fetch())
    {?>
	<!-- il faut créer des form dans la boucle while pour pouvoir créer un bouton supprimer qui va supprimer la bonne valeur du champ cacher et non la dernière -->
 <form method="post" action="delete_cat.php" enctype= "multipart/form-data">
 <td> <?php echo $donnees['parcours'] ?>  </td>
	<td> <?php echo $donnees['annee_debut'] ?>  </td>
	<td> <?php echo $donnees['annee_fin'] ?>  </td>
    <td>  <?php echo $donnees['cat']; ?></td> 
	<td>	<?php echo $donnees['distance'];?> </td>
	<td>  <?php echo $donnees['heure_depart']; ?></td> 
	<td>  <?php echo $donnees['sexe']; ?></td> 
	<td>	<?php echo $donnees['prix_internet'];?> </td>
	<td>	<?php echo $donnees['prix_place'];?> </td>
	<!-- ajout d'une cellule cacher avec la valeur de la catégorie -->
	<td style="border:0px"align="left" valign="middle" ><?php echo "<input type=\"hidden\"  name=\"supp\"value=\"".$donnees['cat']."\">";
	// ajout d'une du bouton supprimer de type image 
	echo "<input type=\"image\" src=\"images/delete.JPG\" title=\"delete\"width=\"30\" height=\"30\">";?></td>
	</tr>
</form>

      <?php
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
//formulaire de modification du texte de la course
?>

   <form method="post" action="envoie_accueil.php" enctype= "multipart/form-data">
	<Fieldset>
	<legend> Modification page des courses</legend>
	<input type="hidden" name="page" value="course"/>

	<p><label for="nom">Titre</label> : <textarea name="titre" id="titre"tabindex="50" rows="4" cols="80"   ><?php echo($titre2);?></textarea><br/><br/>
	
	<p><label for="nom">Texte</label> : <textarea name="texte" id="texte"tabindex="60" rows="20" cols="80"  ><?php echo($texte2);?></textarea><br/><br/>
	
	<input TYPE="image" src="images/mod.JPG"title="modifier" />
	</Fieldset>
	</form>
	
<!--formulaire d'ajout d'une nouvelle catégorie -->
 <form method="post" action="ajout_categorie.php" enctype= "multipart/form-data">
 <Fieldset>
  <p> <label for="remarque">Parcours</label><select name="parcours">
	   <option value="">Choisissez un parcours</option>
	   <option value="GP">Grand parcours 8.5km</option>
	   <option value="PP">Petit parcours 3km</option>
	   <option value="enfants">Course des enfants</option>
	   <option value="Walking">Walking 8.5km</option>
	   </select><br/></br>
	   <p><label for="Nom">Année:</label> de <input type="text" name="annee_debut" id="annee_debut" tabindex="1" /> à <input type="text" name="annee_fin" id="annee_fin" tabindex="2" /></p>
		   <p><label for="Nom">Heure Départ:</label> <input type="text" name="heure" id="heure" tabindex="10" /></p>
	   <p><label for="prenom">Catégorie:</label>  <input type="text" name="cat" id="cat" tabindex="20" /></p>
	   <p><label for="Date">Distance:</label> <input type="text" name="distance" id="distance" tabindex="30"/></p>
	   <p><label for="mail">Prix par internet:</label> <input type="text" name="prix_internet" id="prix_internet" tabindex="40"/></p>
	   <p><label for="adresse">Prix sur place:</label> <input type="text" name="prix_place" id="prix_place" tabindex="50"/></p>
	   <label>Sexe  :</label>
       Homme<input type="radio" name="sexe" value="Homme" id="sexe" />
       Dame<input type="radio" name="sexe" value="Femme" id="sexe" /> 
	   Mixte<input type="radio" name="sexe" value="Mixte" id="sexe" /></br>
	   <input TYPE="image" src="images/ajout.JPG"title="ajout" />
</Fieldset>
</form>
</div>

   </body>
 </html>
 