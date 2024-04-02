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
	if (f.nom2.value.length<3) {
		alert("Merci d'indiquer votre nom");
		f.nom2.focus();
		return false;
	}
		if (f.prenom.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom.focus();
		return false;
	}
			if (f.prenom2.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom2.focus();
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

	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>

<div id="formulaire">
   <H3> Formulaire d'inscription au relais </h3>

   Le relais peu être composé de 2 ou 3 coureurs. (aucune inscription relais sur place)
   <Fieldset>
      <Fieldset>
   <form method="post" action="cible_relais.php">
   </br>
   	   <p><label for="Nom_equipe">Nom  de l'équipe :</label> <input type="text" name="Nom_equipe" id="Nom_equipe" tabindex="10" size="35"  /></p>
	
   Coureur 1
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
       Homme<input type="radio" name="sexe" value="H" id="sexe"  /></br>
      	         <label style="color:#C0C0C0" >t     t </label> Dame<input type="radio" name="sexe" value="D" id="sexe"  /> 
	      </Fieldset>
		   <Fieldset>
</br>
	   Coureur 2</br>
	   <p><label for="Nom2">Nom *:</label> <input type="text" name="nom2" id="nom2" tabindex="10" size="35"  /></p>
	   <p><label for="prenom2">Prénom *:</label>  <input type="text" name="prenom2" id="prenom2" tabindex="20" size="35"/></p>
	   <p><label for="date2">Année de Naissance *:</label> <input type="text" name="date2" id="date2" tabindex="30"size="35"/></p>
	   <p><label for="mail2">Adresse e-mail *:</label> <input type="text" name="email2" id="email2" tabindex="40"size="35"/></p>
	   <p><label for="adresse2">adresse :</label> <input type="text" name="adresse2" id="adresse2" tabindex="50"size="35"/></p>
		<p><label for="npa2">NPA :</label> <input type="text" name="zip2" id="zip2" tabindex="60"size="35"/></p>
		<p><label for="localite2">Localité :</label> <input type="text" name="ville2" id="ville2"tabindex="70"size="35"/></p>
		<p><label for="pays2">Pays :</label>  <input type="text" name="pays2" id="pays2"tabindex="150"size="35"/></p>
  <p>
       <label>Sexe * :</label>
       Homme<input type="radio" name="sexe2" value="H" id="sexe2"  /></br>
      	         <label style="color:#C0C0C0" >t     t </label> Dame<input type="radio" name="sexe2" value="D" id="sexe2"  /> 
	   	      </Fieldset>
		   <Fieldset>
	   </br>
	   Coureur 3  (falculatif)</br>
	   <p><label for="Nom3">Nom :</label> <input type="text" name="nom3" id="nom3" tabindex="10" size="35"  /></p>
	   <p><label for="prenom3">Prénom :</label>  <input type="text" name="prenom3" id="prenom3" tabindex="20" size="35"/></p>
	   <p><label for="date3">Année de Naissance :</label> <input type="text" name="date3" id="date3" tabindex="30"size="35"/></p>
	   <p><label for="mail3">Adresse e-mail :</label> <input type="text" name="email3" id="email3" tabindex="40"size="35"/></p>
	   <p><label for="adresse3">adresse :</label> <input type="text" name="adresse3" id="adresse3" tabindex="50"size="35"/></p>
		<p><label for="npa3">NPA :</label> <input type="text" name="zip3" id="zip3" tabindex="60"size="35"/></p>
		<p><label for="localite3">Localité :</label> <input type="text" name="ville3" id="ville3"tabindex="70"size="35"/></p>
		<p><label for="pays3">Pays :</label>  <input type="text" name="pays3" id="pays3"tabindex="150"size="35"/></p>
  <p>
       <label>Sexe * :</label>
       Homme<input type="radio" name="sexe3" value="H" id="sexe3"  /></br>
       	         <label style="color:#C0C0C0" >t     t </label>Dame<input type="radio" name="sexe3" value="D" id="sexe3"  /> 
	 </select>
	  </Fieldset>
   <p>
	
  <p>
	 Informations complémentaires ou problème d'inscription : Baume Marc marcbaume12@gmail.com ou au 078 / 907 .40.59
</p>
     
	     <CENTER>
		 </br>
       <input type="button" value="Envoyer" onclick="checkForm(this.form)" style= " width: 100px; height: 50px";>  </br>
 

 les champs avec un * sont obligatoires
 </center>
   </Fieldset>

</form>
</div>
  <?php include ("sponsors.php"); ?>
 <?php include ("footer.php"); ?>
 </div>
    </body>
</html>
 

   </body>
</html>
 





