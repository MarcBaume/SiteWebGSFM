<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Bienvenue sur le site du Groupe sportif Franches-montagnes</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style_admin.css" />
   </head>
   <body>
<?php include("en_tete.php"); ?> 
<?php include("menu_admin.php"); ?>    

<div id="corps">

   <form method="post" action="traitement_athlete.php" enctype= "multipart/form-data">
	<Fieldset>
	<legend> ajout d'un athlète dans la base de donnée</legend>
		Image
		<br />
		<p><label for="nom">Nom</label> : <input type="text" name="nom" id="nom"tabindex="10"/></p>
		<p><label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom"tabindex="20"/></p>
		<p><label for="age">âge</label> : <input type="text" name="age" id="age"tabindex="30"/></p>
		<p><label for="objectif_annee">Objectif de l'année</label> : <input type="text" name="objectif_annee" id="objectif_annee"tabindex="35"/></p>
		<p><label for="objectif1">Objectif N°1</label> : <input type="text" name="objectif1" id="objectif1"tabindex="40"/></p>
		<p><label for="objectif2">Objectif N°2</label> : <input type="text" name="objectif2" id="objectif2"tabindex="50"/></p>
		<p><label for="sportif_pref">Sportif préféré</label> : <input type="text" name="sportif_pref" id="sportif_pref"tabindex="60"/></p>
		<p><label for="sportive_pref">Sportive préféré</label> : <input type="text" name="sportive_pref" id="sportive_pref"tabindex="70"/></p>
		<label>Remarque sur le club:</label><br/>
		 <textarea name="remarque" id="remarque"></textarea><br/><br/>
		<label>Photo:</label>
		<label for="photo">photo:</label> :
		<input type="file"  name='photo' />
		<input type="Submit" name="ajouter"/>
	</fieldset>
	</form>
</div>

 

   </body>
 </html>
 





