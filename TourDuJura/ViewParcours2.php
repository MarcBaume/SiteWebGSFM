<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


 <div  id="TableauResulat">


<?	
/*************************** CONNECTION AVEC LA BASE DE DONNEES ***********************************/
  $con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
   if (!$con)
  {
		die('Could not connect: ' . mysql_error());
  }
  else
  {
		mysqli_select_db($con ,'dxvv_jurachrono' );
	}
$pathFile = 'File/Liste.csv';
	
if (file_exists($pathFile)) 
{
	if (($handle = fopen($pathFile, "r")) !== FALSE) 
	{
		?>
		<div class ="TableResult" >
		<form method="post" action="cible.php" name="Formulaire">
			<Table>
			<tr>
				<td><?
		
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
		{
		$num = count($data);
		if ($j==0)
		{ ?>
			<tr >


						<th>

						</th>
							<?for ($c=0; $c < $num; $c++)
							{?>
								<th><?php  echo $data[$c]?> </th><?php
							}?>
				
		
			</tr><?
		}
		else
		{

		
		$ID = $data[0];
		?>
		
			<tr >


						<td>
							<input type="checkbox" style="width: 100%" value="1" id="<?php  echo $ID?>" name="Parcours<?php  echo $ID?>" >
						</td>
							<?for ($c=0; $c < $num; $c++)
							{?>
								<td><?php  echo $data[$c]?> </td><?php
							}?>
				
		
			</tr>
			
									<!-- Dans la base de donnée afficher le nombre de personne partante-->
			<? 	 $sql = 'SELECT * FROM TourDuJura  WHERE IDParcours=\''.$ID. '\'';
				$result = mysqli_query($con,$sql);
				if ($result && mysqli_num_rows($result) > 0) {
					// output data of each row
				while($donnees = mysqli_fetch_assoc($result)) {
					$c=$c+1;
			?>
			<TR >
				<td style="width: 100%"
				colspan="100%">
				<!-- Afficher chaque personne partante -->
				<table style="width: 100%; margin:0px">
					<tr>
						<td style="width: 10%">

						<td>
									<td style="width: 10%">
<i class="fa fa-user" ></i>
						<td>
						<td style="width: 30%">
							<?php echo $donnees['Nom'] ?>
							<?php echo '  ' ?>
							<?php echo $donnees['Prenom'] ?>
						</td>
	
						<td>
							<?php echo $donnees['Localite'] ?>
						</td>
					</tr>
				</table>
				</td>
			</tr>
	
<?
		}
		

		}
		}
		$j = $j+1;
		}?>
		</td>
				</tr>
			</table>
			
			Si vous voulez participé à notre aventure, veuillez remplir ce doodle afin de nous avertir de votre présence à ces heures.</br></br>
 -  Cocher les étapes que vous désirer pour vous inscrire. </br> </br>
 - Chaque athlètes peux faire plusieurs créneaux. </br> </br>
 - le retour au voiture sera organisé par le bus suiveur. </br> </br>
 - Chaque créneaux est limité à maximum 30 personnes afin de respecter les normes sanitaire en vigueur. La priorité sera donnée aux membres du club.
</br></p>
				<p><label for="nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10"   /></p>
	<p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20"/></p>
	<p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"/></p>
	<p><label for="Telephone">Téléphone *:</label> <input type="text" name="Telephone" id="Telephone" tabindex="50"/></p>
	<p><label for="date">année de naissance *:</label> <input type="text" name="date" id="date" tabindex="60"/></p>
	<p><label for="localite">Localité *:</label> <input type="text" name="ville" id="ville"tabindex="70"/></p>
	<p><label for="Remarque">Commentaire:</label> 	<textarea rows="4" cols="50" name="Remarque" ></textarea>
	
	<input type="button"  id="ButtonSend" value="je m'inscris" onclick="check2(this.form )" style= " width: 100px; height: 50px";>  </br>
	
		</form>
		<?
	}
}
else
{
echo 'fichier existe pas ';
}?>
		</div>
</div>
</body>
</html>
<script>
function isMail2(txtMail)
{
	var regMail=new RegExp("^[0-9a-z._-]+@{1}[0-9a-z. -]{2,}[.]{1}[a-z]{2,5}$", "i");
	return regMail.test(txtMail);
}
function check2(f1) {
	if (f1.nom.value.length<3) {
		alert("Merci d'indiquer votre nom");
		f1.nom.focus();
		return false;
	}

		if (f1.prenom.value.length<3) {
		alert("Merci d'indiquer votre prénom");
		f1.prenom.focus();
		return false;
	}
		if (!isMail2(f1.email.value)) {
		alert("Merci d'indiquer un mail valide pour que nous puissions vous répondre");
		f1.email.focus();
		return false;
	}
	
			if (f1.ville.value.length<3) {
		alert("Merci d'indiquer votre localite");
		f1.ville.focus();
		return false;
	}
	
		if (f1.date.value.length!=4) {
		alert("Merci d'indiquer votre année de naissance ex: 1988");
		f1.date.focus();
		return false;
	}
	
	

	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f1.submit();
	}
	
	
}
</script>
								

