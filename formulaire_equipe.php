<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php include("head.php"); ?>
   <body>
        				
<?php include("en_tete.php"); ?> 
<?php include("menu_vertical.php"); ?> 

<Div id="corps">
<?php 
    // On se connecte à MySQL

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  ?>
<script type="text/javascript">

function isMail(txtMail) {
	var regMail=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z. -]{2,}[.]{1}[a-z]{2,5}$", "i");
	return regMail.test(txtMail);
}
function checkForm(f) {
	if (f.Nom_equipe.value.length<3) {
		alert("Merci d'indiquer un nom d'équipe");
		f.nom_equipe.focus();
		return false;
	}
		if (!isMail(f.email.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f.email.focus();
		return false;
	}
	if (f.Nom1.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.nom1.focus();
		return false;
	}
		if (f.Nom2.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.nom2.focus();
		return false;
	}
		if (f.Nom3.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.nom3.focus();
		return false;
	}
		if (f.Prenom1.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom1.focus();
		return false;
	}
			if (f.Prenom2.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom2.focus();
		return false;
	}
			if (f.Prenom3.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f.prenom3.focus();
		return false;
	}
	var exist1 = false;
	var exist2 = false;
	var exist3 = false;
	<?php 
//vérification que chaque nom d'équipe existe 
 // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM equipe ');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	?>

		var nom_equipe = '<?php echo $donnees['Nom_equipe'] ?>';

	//vérification que le nom d'utilisateur existe
	  if (f.Nom_equipe.value ==  nom_equipe)
	{
			alert(f.Nom_equipe.value +"  "+nom_equipe )	
				alert("Ce nom d'équipe existe déjà");
		f.Nom_equipe.focus();
		return false;
	}
	<?php
	}
	$reponse->closeCursor(); // Termine le traitement de la requête

    // On se connecte à MySQL

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_jurachrono', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  
	//vérification que chaque nom d'équipe existe 
  // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM inscription ');
	
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
	?>
	var nom_bdd = '<?php echo $donnees['Nom'] ?>';
	var prenom_bdd = '<?php echo $donnees['Prenom'] ?>';
		var remarque = '<?php echo $donnees['parcours'] ?>';

    if (f.Nom1.value == nom_bdd && f.Prenom1.value == prenom_bdd && remarque == "Grand Parcours")
	{
		
		exist1 = true;
	//	echo "inscription déjà existante , si vous ne comprenez pas votre porblème écrivez un mail à marcbaume2@gmail.com";
	//	exit;
	}
	

	
    if (f.Nom2.value == nom_bdd && f.Prenom2.value == prenom_bdd && remarque == "Grand Parcours")
	{
		exist2 = true;
	//	echo "inscription déjà existante , si vous ne comprenez pas votre porblème écrivez un mail à marcbaume2@gmail.com";
	//	exit;
	}
	
	
    if (f.Nom3.value == nom_bdd && f.Prenom3.value == prenom_bdd && remarque == "Grand Parcours")
	{
		exist3 = true;
	//	echo "inscription déjà existante , si vous ne comprenez pas votre porblème écrivez un mail à marcbaume2@gmail.com";
	//	exit;
	}
	<?php
    }
	$reponse->closeCursor(); // Termine le traitement de la requête
?>
	exist1 = true;
	exist2 = true;
    exist3 = true;
	if (exist1 == true && exist2 == true && exist3 == true)
	{
				
			if (confirm("Etes-vous sur des informations de votre inscriptions par équipe?"))
				{
	f.submit();
			}
		
	}
	else
	{
			if (exist1 != true )
	{
				
		alert("le coureur 1 n'existe pas dans la liste des inscrits individuel");
		f.Prenom1.focus();
		return false;
	
		
	}
				if (exist2 != true )
	{
			
		alert("le coureur 2 n'existe pas dans la liste des inscrits individuel");
		f.Prenom2.focus();
		return false;
	
		
	}
				if (exist3!= true )
	{
				
		alert("le coureur 3 n'existe pas dans la liste des inscrits individuel");
		f.Prenom3.focus();
		return false;
	
	}
	
	}


}
</script>

<div id="formulaire">
   <H3> Formulaire d'inscription <b>équipe </b> pour la Course des Franches</h3></br>
<b> Pour inscrire une équipe, il faut que chaque personne soit inscrite individuellement et que les noms et prénoms de chaque membre soient orthographiés de la même manière que dans l'inscription individuelle
  <Fieldset>
   <form method="post" action="cible_equipe.php">
    
	   <p><label for="Nom_equipe">Nom d'équipe *:</label> <input type="text" name="Nom_equipe" id="Nom_equipe" tabindex="10" size="35"  /></p>
   coureur 1 </br>
	   <p><label for="Nom1">Nom *:</label> <input type="text" name="Nom1" id="Nom1" tabindex="10" size="35"  /></p>
	   <p><label for="Prenom1">Prénom *:</label>  <input type="text" name="Prenom1" id="Prenom1" tabindex="20" size="35"/></p>
	   	   <p><label for="email">Adresse e-mail</label>  <input type="text" name="email" id="email" tabindex="20" size="35"/></p>
	coureur 2 </br>
		   <p><label for="Nom2">Nom *:</label> <input type="text" name="Nom2" id="Nom2" tabindex="10" size="35"  /></p>
	   <p><label for="Prenom2">Prénom *:</label>  <input type="text" name="Prenom2" id="Prenom2" tabindex="20" size="35"/></p>
	    coureur 3 </br>
	   	   <p><label for="Nom3">Nom *:</label> <input type="text" name="Nom3" id="Nom3" tabindex="10" size="35"  /></p>
	   <p><label for="Prenom3">Prénom *:</label>  <input type="text" name="Prenom3" id="Prenom3" tabindex="20" size="35"/></p>
	
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
 






