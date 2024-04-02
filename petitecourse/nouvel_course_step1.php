<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>GSFM</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	       <link rel="stylesheet" media="screen" type="text/css" title="style" href="style.css" />

</head>
   <body>
  <?php include("onglets.php"); ?>
<?php include("menu_vertical.php"); ?>
<?php include("menu_horizontal.php"); ?>
<script type="text/javascript">

function isMail(txtMail) {
	var regMail=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z. -]{2,}[.]{1}[a-z]{2,5}$", "i");
	return regMail.test(txtMail);
}
function checkForm(f) {
	if (f.nom.value.length<3) {
		alert("Merci de donner un nom à votre course");
		f.nom.focus();
		return false;
	}
		if (f.lieu.value.length<3) {
		alert("Merci d'indiquer le lieu de votre course (village ou ville)");
		f.lieu.focus();
		return false;
	}
		if (f.emplacement.value.length<4) {
		alert("Merci d'indiquer l'emplacement de votre course");
		f.emplacement.focus();
		return false;
	}
		if (f.organisateur.value.length<3) {
		alert("Merci d'indiquer le nom du club ou de la sociète qui organise la course");
		f.organisateur.focus();
		return false;
	}
			if (f.contact.value.length<4) {
		alert("Merci d'indiquer le nom et le prénom de la personne de contact");
		f.contact.focus();
		return false;
	}
	
	if (f.telephone.value.length<3) {
		alert("Merci d'indiquer un numéro de téléphone pour vous contacter si besoin");
		f.telephone.focus();
		return false;
	}
	if (!isMail(f.mail.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f.mail.focus();
		return false;
			}
	if (f.canton.selectedIndex==0) {
		alert("Merci d'indiquer dans le canton ou aura lieu la course");
		f.canton.focus();
		return false;
	}
	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>
<div id="corps">
<form method="post" action="nouvel_course_step2.php">
<ul id="step">
<fieldset>
<legend>étape 1 </legend>
 <p><label for="nom">Nom de la course</label> <input type="text" name="nom" id="nom" tabindex="10"  size="60" /></p>
  <p><label for="lieu">Lieu</label> <input type="text" name="lieu" id="lieu" tabindex="20"  size="60" /></p>
  <p><label for="emplacement">Emplacement</label> <input type="text" name="emplacement" id="emplacement" tabindex="30"  size="60" /></p>
   <p><label for="organisateur">Organisateur</label> <input type="text" name="organisateur" id="organisateur" tabindex="40"  size="60" /></p>
    <p><label for="contact">Nom & Prénom </label> <input type="text" name="contact" id="contact" tabindex="50"  size="60" />(personne de contact)</p>
    <p><label for="telephone">N° téléphone</label> <input type="text" name="telephone" id="telephone" tabindex="30"  size="60" /></p>
	<p><label for="mail">e-mail</label> <input type="text" name="mail" id="mail" tabindex="30"  size="60" /></p>
  <p><label for="canton">Canton</label><select name="canton"> 
 <?php
 $canton = Array("choix du canton","AG : Argovie - Aargau", "AI : Appenzell Rhodes intérieures - Inner-Rhoden", "AR : Appenzell Rhodes extérieures - Ausser-Rhoden",
 "BE : Berne - Bern", "BL : Bâle Campagne - Basel Land",  "BS : Bâle Ville - Basel Stadt", "FR : Fribourg - Freiburg", "GE : Genève - Genf", "GL : Glaris - Glarus", "GR : Grisons - Graubuenden",
 "JU : Jura", "LU : Lucerne -Luzern","NE : Neuchâtel - Neuenburg", "NW : Nidwald - Nidwalden ","OW : Obwald - Obwalden", "SG : Saint-Gall - Sankt Gallen",
 "SH : Schaffhouse - Schaffausen ","SO : Soleure - Solothurn", "SZ : Schwyz","SO : Soleure - Solothurn", "SZ : Schwyz","TG : Thurgovie - Thurgau",
 "TI : Ticino - Tessin","UR : Uri", "VD : Vaud - Waadt","VS : Valais - Vallis","ZG : Zug", "ZH : Zurich - Zürich");
 for ($x=1; $x <= count($canton); $x++) {
	echo"<option value=\"$x\"";
	if ($x == $canton) {
		echo " selected";
	}
	echo ">".$canton[$x-1]."</option>";
}
?>
</select>
 
<p><label for="date ">date</label>
<select name="day">
<?php
for ($x=1; $x<=31; $x++) {
	echo "<option";echo " selected";
	echo ">$x</option>";
}
?>
</select>
<select name="month">
<?php
$month = Array("Janvier", "Février", "Mars", "Avril", "Mai",  "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
for ($x=1; $x <= count($month); $x++) {
	echo"<option value=\"$x\"";
	if ($x == $month) {
		echo " selected";
	}
	echo ">".$month[$x-1]."</option>";
}
?>
</select>
<select name="year">
<?php
for ($x=2012; $x<=2020; $x++) {
	echo "<option";
		echo " selected";
	echo ">$x</option>";
}
?>
</select>
</p> 

</fieldset>
</ul>

<center>
<button type="button" onClick="checkForm(this.form)"><img src="images/bouton_next.png"style="background-color:transparent"width="50" height="50"></button> 

</form>
</center>
</div>
   </body>
   </html>
   