
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

	<form method="post" action="CiblesDeleteEntrainement.php">
	  <?php
	 
try
{
    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $reponse = $bdd->query('SELECT * FROM Entrainement ORDER BY num ASC');
    // On affiche chaque entr�e une � une
    while ($donnees = $reponse->fetch())
    {
    ?>
	<fieldset>
	<legend><?php
echo "<input type=\"radio\" name=\"supp\"  value=\"".$donnees['ID']."\">"; echo $donnees['jour']; ?>  </legend>
	
 
	
	<p>	
	Horaire: de
	 
         <?php echo  $donnees['debut']; ?> 
	
       <?php echo $donnees['fin']; ?>   </p>


         <p>Lieu: <?php echo $donnees['lieu']; ?> </p>
	
	
       <p>  Activité:<?php echo $donnees['activite']; ?></p>

        <p> Remarque:<?php echo $donnees['remarque']; ?> </p>
</fieldset>
    <?php

    }
    
    $reponse->closeCursor(); // Termine le traitement de la requ�te

}
catch(Exception $e)
{
    // En cas d'erreur pr�c�demment, on affiche un message et on arr�te tout
    die('Erreur : '.$e->getMessage());
}
?>

<input type="Submit" value="delete" name="Delete"/>

</form>



   <form method="post" action="CibleAddEntrainement.php" enctype= "multipart/form-data">
	<Fieldset>
	<legend> ajout d'un entraînement</legend>
	    <p><label for="jour">Jour</label><select name="jour">
	   <option value="Lundi">Lundi</option>
	   <option value="Mardi">Mardi</option>
	   <option value="Mercredi">Mercredi</option>
	   <option value="Jeudi">Jeudi</option>
	   <option value="Vendredi">Vendredi</option>
		<option value="Samedi">Samedi</option>
	   <option value="Dimanche">Dimanche</option> 
	     </select></p> 
	<p><label for="nom">Debut</label> : <input type="text" name="debut" id="debut"tabindex="20"/>
	<label for="nom">Fin</label> : <input type="text" name="fin" id="fin"tabindex="30"/></p>
	<p><label for="nom">Lieu</label> : <input type="text" name="lieu" id="lieu"tabindex="40"size="60"/></p>
	<p><label for="nom">Activité</label> : <input type="text" name="activite" id="activite"tabindex="50"  size="100"/></p>
	<p><label for="nom">Remarque</label> : <textarea name="remarque" id="remarque"tabindex="60" rows="20" cols="80"  ></textarea><br/><br/>
	<input type="Submit" value="ajouter" name="ajouter"/>
	</fieldset>
	</form>
</div>

 

   </body>
 </html>
 