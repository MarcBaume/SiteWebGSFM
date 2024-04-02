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
		if (f.date.value.length<6) {
		alert("Merci d'indiquer votre date de naissance ex: 12.08.1988");
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
				if (f.tel.value.length<3) {
		alert("Merci d'indiquer votre Téléphone");
		f.tel.focus();
		return false;
	}
	
	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>

<div id="formulaire">
   <H3> Formulaire d'inscription au club du GSFM</h3>

   <Fieldset>
   <form method="post" action="cible_club.php">
	   <p><label for="Nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10" size="35"  /></p>
	   <p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20" size="35"/></p>
	   <p><label for="date">Date de Naissance *:</label> <input type="text" name="date" id="date" tabindex="30"size="35"/></p>
	   <p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"size="35"/></p>
	   <p><label for="adresse">Adresse *:</label> <input type="text" name="adresse" id="adresse" tabindex="50"size="35"/></p>
		<p><label for="npa">NPA *:</label> <input type="text" name="zip" id="zip" tabindex="60"size="35"/></p>
		<p><label for="localite">Localité *:</label> <input type="text" name="ville" id="ville"tabindex="70"size="35"/></p>
		<p><label for="tel">N° Téléphone*: </label> <input type="text" name="tel" id="tel"tabindex="80"size="35"/></p>
 
	 Informations complémentaires ou problème d'inscription : Joly Michel 079 276 42 19 ou Patrick Jeanbourquin 078 629 55 74

	     <CENTER>
		 </br>
       <input type="button" value="Envoyer" onclick="checkForm(this.form)" style= " width: 100px; height: 50px";>  </br>
 

 les champs avec un * sont obligatoires
 </center>
   </Fieldset>

</form>

  <?php include ("sponsors.php"); ?>
 <?php include ("footer.php"); ?>
 </div>
    </body>
</html>
 

   </body>
</html>
 





