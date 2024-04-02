<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        				
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">
<script type="text/javascript">

function isMail(txtMail) {
	var regMail=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z. -]{2,}[.]{1}[a-z]{2,5}$", "i");
	return regMail.test(txtMail);
}
function checkForm(f) {
	if (f.nom.value.length<3) {
		alert("Merci d'indiquer votre nom");
		f.nom.focus();
		return false;
	}

		if (f.prenom.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom.focus();
		return false;
	}
		if (!isMail(f.email.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f.email.focus();
		return false;
	}
		if (f.date.value.length!=4) {
		alert("Merci d'indiquer votre année de naissance ex: 1988");
		f.date.focus();
		return false;
	}
		if (f.adresse.value.length<3) {
		alert("Merci d'indiquer votre adresse");
		f.adresse.focus();
		return false;
	}
			if (f.zip.value.length<4) {
		alert("Merci d'indiquer votre npa");
		f.zip.focus();
		return false;
	}
			if (f.ville.value.length<3) {
		alert("Merci d'indiquer votre localite");
		f.ville.focus();
		return false;
	}
	

		var isNote=false;
	for (var i=0; i<f.sexe.length ; i++ ) {
		if (f.sexe[i].checked) {
			isNote=true;
		}
	}
	if (isNote==false) {
			alert("Merci d'indiquer votre sexe");
			f.sexe[homme].focus();
			return false;
		
	}
	if (f.remarque.selectedIndex==0) {
		alert("Merci d'indiquer le type de votre parcours");
		f.remarque.focus();
		return false;
	}
	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>

<div id="formulaire">
   <H3> Formulaire d'inscription pour la Course des Franches</h3>

   <Fieldset>
   <form method="post" action="cible.php">
	   <p><label for="Nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10" size="35"  /></p>
	   <p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20" size="35"/></p>
	   <p><label for="date">Année de Naissance *:</label> <input type="text" name="date" id="date" tabindex="30"size="35"/></p>
	   <p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"size="35"/></p>
	   <p><label for="adresse">adresse *:</label> <input type="text" name="adresse" id="adresse" tabindex="50"size="35"/></p>
		<p><label for="npa">NPA *:</label> <input type="text" name="zip" id="zip" tabindex="60"size="35"/></p>
		<p><label for="localite">Localité *:</label> <input type="text" name="ville" id="ville"tabindex="70"size="35"/></p>
		<p><label for="tel">N° Téléphone: </label> <input type="text" name="tel" id="tel"tabindex="80"size="35"/></p>
		<p><label for="club">Club:</label> <input type="text" name="club" id="club"tabindex="90"size="35"/></p>
		<p><label for="pays">Pays *:</label>  <input type="text" name="pays" id="pays"tabindex="150"size="35"/></p>
  <p>
       <label>Sexe * :</label>
       Homme<input type="radio" name="sexe" value="Homme" id="sexe"  />
       Dame<input type="radio" name="sexe" value="Dame" id="sexe"  /> 
	    <?php 
		 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
	$reponse = $bdd->query('SELECT * FROM parcours ');?>
	<p> <label for="remarque">Parcours:*  </label><select name="remarque">
	<option value="">Choisissez un parcours</option>
	<?php
	  while ($donnees = $reponse->fetch())
    {
	   echo "<option value=\"".$donnees['abreviation']."\">\"".$donnees['nom']."\"</option>";
	}
	?>
	 </p>
	 </select>
   <p>
	J'autorise les principaux sponsors du GSFM à m'envoyer leurs meilleures offres
	<input type="checkbox" name="sponsors" id="sponsors" checked="checked" /> </p>
	 
	 Informations complémentaires ou problème d'inscription : Joly Michel 079 276 42 19 ou Patrick Jeanbourquin 078 629 55 74

     
	     <CENTER>
		 </br>
       <input type="button" value="Envoyer" onclick="checkForm(this.form)" style= " width: 100px; height: 50px";>  </br>
 

 les champs avec un * sont obligatoires
 </center>
   </Fieldset>

</form>
Pour une inscription de groupe (club,école...) veuillez télécharger et remplir le document au format excel 
 <li><a href="inscription.xls">cliquer ici.</a></li>
 Merci de renvoyer la liste à l'adresse suivante: jeanbourquin_p@yahoo.fr avant le jeudi 5 juin 12h00.
</div>
  <?php include ("sponsors.php"); ?>
 <?php include ("footer.php"); ?>
 </div>
    </body>
</html>
 

   </body>
</html>
 





