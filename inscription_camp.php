<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        		
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 
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
		if (!isMail(f.mail.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f.mail.focus();
		return false;
	}
		if (f.date.value.length!=10) {
		alert("Merci d'indiquer votre date de naissance ex: 25.10.1988");
		f.date.focus();
		return false;
	}
		if (f.adresse.value.length<3) {
		alert("Merci d'indiquer votre adresse");
		f.adresse.focus();
		return false;
	}
			if (f.npa.value.length<4) {
		alert("Merci d'indiquer votre npa");
		f.npa.focus();
		return false;
	}
			if (f.localite.value.length<3) {
		alert("Merci d'indiquer votre localite");
		f.localite.focus();
		return false;
	}
			if (f.tel.value.length<3) {
		alert("Merci d'indiquer votre numéro de téléphone");
		f.tel.focus();
		return false;
	}


	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>

<div id="corps">

   <H3> Formulaire d'inscription pour le camp de Tenero </h3>
   <ul id="formulaire">
   
   <Fieldset>
   </br>
   <form method="post" action="cible_2.php">
	   <p><label for="Nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10" /></p>
	   <p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20" /></p>
	   <p><label for="Date">Date de Naissance *:</label> <input type="text" name="date" id="date" tabindex="30"/></p>
	   <p><label for="mail">Adresse e-mail *:</label> <input type="text" name="mail" id="mail" tabindex="40"/></p>
	   <p><label for="adresse">adresse *:</label> <input type="text" name="adresse" id="adresse" tabindex="50"/></p>
		<p><label for="npa">NPA *:</label> <input type="text" name="npa" id="npa" tabindex="60"/></p>
		<p><label for="localite">Localité *:</label> <input type="text" name="localite" id="localite"tabindex="70"/></p>
		<p><label for="tel">N° Téléphone*: </label> <input type="text" name="tel" id="tel"tabindex="80"/></p>
  <p>

	 </p>
	 </select>

      <p>
	     <CENTER>
       <input type="button" value="Envoyer" onclick="checkForm(this.form)">  <input type="reset" />
   </p>

 les champs avec un * sont obligatoires
 </center>
   </Fieldset>
	</ul>

</form>

</div>
    </body>
</html>
 
<?php include ("footer.php"); ?>


   </body>
</html>
 





