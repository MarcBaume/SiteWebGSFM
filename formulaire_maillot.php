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

	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f.submit();
	}
}
</script>
<Div id="main">
<H3> Formulaire d'inscription pour la Course des Franches</h3>
<div id="formulaire">
   

   <Fieldset>
   <form method="post" action="cibleMaillot.php">
	   <p><label for="Nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10" size="35"  /></p>
	   <p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20" size="35"/></p>
	   <p><label for="date">Année de Naissance *:</label> <input type="text" name="date" id="date" tabindex="30"size="35"/></p>
	   <p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"size="35"/></p>
	   <p><label for="Nombre">Nombre:</label>  <input type="text" name="Nombre" id="Nombre" tabindex="20" size="35"/></p>
	    <p>       <label>Sexe :</label></br> 
	     Homme<input type="radio" name="sexe" value="140" id="Sexe"  /> </br>  
		 Dame<input type="radio" name="sexe" value="152" id="Sexe"  /> </br> </p>
  <p>
       <label>Taille Maillot :</label><select   name="Maillot" >
	   <option value= 140> 140</option>
	   	   <option value= 152> 152</option>
		   	   <option value= 164> 164</option>
			   	   <option value= XS> XS</option>
				   	   <option value= S> S</option>
						   	   <option value= M> M</option>
							   <option value= L> L</option>
							   	   <option value= XL> XL</option>
				   
	</select>
    </p>
	<p>
	       <label>Taille Short :</label></label><select   name="Short" >
	   <option value= 140> 140</option>
	   	   <option value= 152> 152</option>
		   	   <option value= 164> 164</option>
			   	   <option value= XS> XS</option>
				   	   <option value= S> S</option>
						   	   <option value= M> M</option>
							   <option value= L> L</option>
							   	   <option value= XL> XL</option>
				   
	</select>
	</p>

	<p><label for="Remarque">Remarque:</label> <input type="text" name="Remarque" id="Remarque" tabindex="70" size="200"  /></p>
	
   <p>

	 Informations complémentaires ou problème d'inscription : Joly Michel 079 276 42 19 ou Patrick Jeanbourquin 078 629 55 74

     
	     <CENTER>
		 </br>
       <input type="button" value="Envoyer" onclick="checkForm(this.form)" style= " width: 100px; height: 50px";>  </br>
 

 les champs avec un * sont obligatoires
 </center>
   </Fieldset>
   </Fieldset>
      </Fieldset>
</form>
</div>


<h2> Sponsors </h2>
<fieldset>
  <?php include ("sponsors.php"); ?>
  </fieldset>

 <?php include ("footer.php"); ?>
 </div>
  </div>
</div>
    </body>
</html>


 





