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
$pathFile = 'File/Liste2021.csv';
	
if (file_exists($pathFile)) 
{
	if (($handle = fopen($pathFile, "r")) !== FALSE) 
	{
		?>
		
		<div class ="TableResult" >
		<form method="post" action="cible.php" name="Formulaire">
		<Table style="width:50%;">
			<tr onClick="ClickAllRows(event)" style="cursor: pointer; background-color: #b3f3fa;">
				<td>
					<i class="fa fa-user" ></i> 
				</td>
				<td>
					Afficher tous les athlètes
				</td>
		 <tr>
		 </table>
			<Table>
			<tr>
				<td><?
		
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
		{
		$num = count($data);
		if ($j==0)
		{ ?>
			<tr  >


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
					<!-- Dans la base de donnée afficher le nombre de personne partante-->
			<? 	 $sql = 'SELECT * FROM TourDuJura  WHERE IDParcours=\''.$ID. '\'';
				$result = mysqli_query($con,$sql);

				if (($ID % 2)>0)
				{
				?>
			<tr onClick="ClickRows( event, <?php echo $ID ?>)" style="cursor: pointer;background-color:  rgba(242, 242,242, 0.3) ;" >
				<?
				}
				else
				{?>
			<tr onClick="ClickRows( event, <?php echo $ID ?>)" style="cursor: pointer;background-color:  rgba(30, 138,194, 0.3);"  >
				<?
				}?>

					<td>
						<input type="checkbox" style="width: 100%" value="1" id="<?php  echo $ID?>" name="Parcours<?php  echo $ID?>" >
					</td>
						<?for ($c=0; $c < $num; $c++)
						{?>
							<td><?php  echo $data[$c]?> </td><?php
						}
						// Si des athletes sont inscrit au point de passage 
						if ($result && mysqli_num_rows($result) > 0) {
						?>
							<td>
							<?php echo mysqli_num_rows($result) . "x "?><i class="fa fa-user" ></i>
							</td>
							<td>
								<span class="dot2" id="<?php echo "Icons".$ID  ?>">
									 <i  style="  margin:3.2px; margin-left:5px;"  class="fa fa-plus"></i>
								 </span>
								 <span style=" visibility: collapse;"  class="dot2" id="<?php echo "IconsMinus".$ID  ?>">
									  <i  style="  margin:3.2px; margin-left:5px;"  class="fa fa-minus" ></i>
								</span>
							</td>
						<?
						}
						else
						{
						?>
							<td>
							<?php echo "0x "?><i class="fa fa-user" ></i>
							</td>
							<td>
								<span class="dot2" id="<?php echo "Icons".$ID  ?>">
									 <i  style="  margin:3.2px; margin-left:5px;"  class="fa fa-plus"></i>
								 </span>
								 <span style=" visibility: collapse;"  class="dot2" id="<?php echo "IconsMinus".$ID  ?>">
									  <i  style="  margin:3.2px; margin-left:5px;"  class="fa fa-minus" ></i>
								</span>
							</td>
						<?
						}
						?>
			</tr>
			<TR style="visibility: collapse"  id="User<?php  echo $ID?>" >
			<?
			if ($result && mysqli_num_rows($result) > 0) 
			{
				?>
			
				<td style="width: 100%"
				colspan="100%">
				<table style="width: 100%; margin:0px"><?
					// output data of each row
				while($donnees = mysqli_fetch_assoc($result)) {
					$c=$c+1;
			?>
				<!-- Afficher chaque personne partante -->

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
					<?
				} ?>
				</table>
				</td>
			
<?
			}?>
			</tr>
			<?
		}
		$j = $j+1;
		}?>
		</td>
				</tr>
			</table>
			
	Si vous voulez participé à notre aventure, veuillez remplir ce formulaire afin de nous avertir de votre présence à ces heures.</br></br>
 -  Cocher les étapes que vous désirer pour vous inscrire. </br> </br>
 - Chaque athlètes peux faire plusieurs créneaux. </br> </br>
 - les déplacement seront organisé par le bus suiveur. </br> </br>
</br></p>
	<p><label for="nom">Nom *:</label> <input type="text" name="nom" id="nom" tabindex="10"   /></p>
	<p><label for="prenom">Prénom *:</label>  <input type="text" name="prenom" id="prenom" tabindex="20"/></p>
	<p><label for="mail">Adresse e-mail *:</label> <input type="text" name="email" id="email" tabindex="40"/></p>
	<p><label for="Telephone">Téléphone *:</label> <input type="text" name="Telephone" id="Telephone" tabindex="50"/></p>
	<p><label for="date">année de naissance *:</label> <input type="text" name="date" id="date" tabindex="60"/></p>
	<p><label for="localite">Localité *:</label> <input type="text" name="ville" id="ville"tabindex="70"/></p>
	<p><label for="Coureur">Choix:</label> <input type="radio" name="choix" id="Coureur"tabindex="80"/>Coureur 
															<input type="radio" name="choix" id="Accompagnant"tabindex="81"/>Accompagnant</p>
	<p><label for="Remarque">Commentaire:</label> 	<textarea rows="4" cols="50" name="Remarque"tabindex="90" ></textarea>
	
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
function ClickAllRows(event)
 {  
	let n = 1;
	while (n < 23) 
	{
		ClickRows(event,n);
		n++;
	}
}
function ClickRows(event, id)
    {  
	
	
		if (	document.getElementById("User"+id).style.visibility == "visible")
		{
		
		document.getElementById("IconsMinus"+id).style.visibility = "collapse" ;
		document.getElementById("Icons"+id).style.visibility = "visible" ;
		document.getElementById("User"+id).style.visibility = "collapse" ;
		}
		else
		{
			
			document.getElementById("User"+id).style.visibility = "visible" ;
		document.getElementById("Icons"+id).style.visibility = "collapse" ;
			document.getElementById("User"+id).style.visibility = "visible" ;
		}
	event.stopPropagation(); 
		
    }
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
		if (f1.Parcours1.checked == false && 
		f1.Parcours2.checked == false && 
		f1.Parcours3.checked == false && 
		f1.Parcours4.checked == false && 
		f1.Parcours5.checked == false && 
		f1.Parcours6.checked == false && 
		f1.Parcours7.checked == false && 
		f1.Parcours8.checked == false && 
		f1.Parcours9.checked == false && 	
		f1.Parcours10.checked == false &&
		f1.Parcours11.checked == false &&
		f1.Parcours12.checked == false &&
		f1.Parcours13.checked == false &&
		f1.Parcours14.checked == false &&
		f1.Parcours15.checked == false &&
		f1.Parcours16.checked == false &&		
		f1.Parcours17.checked == false &&	
		f1.Parcours18.checked == false &&	
		f1.Parcours19.checked == false &&	
		f1.Parcours20.checked == false &&	
		f1.Parcours21.checked == false &&	
		f1.Parcours22.checked == false &&	
		f1.Parcours23.checked == false &&	
		f1.Parcours24.checked == false &&	
		f1.Parcours25.checked == false &&	
		f1.Parcours26.checked == false 
		) {
		alert("Cocher au moins un point de pointage");
		return false;
	}
	

	if (confirm("Etes-vous sur des informations de votre inscriptions?")) {
	f1.submit();
	}
	
	
}
</script>
								

