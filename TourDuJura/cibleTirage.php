<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


<div id="info">
<Center>
	<img src="images/LogoTourDuJura.jpg" width="70%" alt=""  align="center"  />
</center>

			</br>	</br>
			<?
			$PrixTotal = $_POST["Valeur"];
			$OrderID = $_POST["email"]. date("YmdHis");
			 /************************* POUR TEST *****************************/

			$string1 = "https://defichrono.payrexx.com/pay?tid=".$OrderID."&invoice_number=".$OrderID."&invoice_amount=".  $PrixTotal ."&invoice_currency=1&contact_forename=". $_POST["nom"] ."&contact_surname=". $_POST["prenom"]."&contact_email". $_POST["email"];
		 ?>
	
		 <a style="background:#dfdfdf ; Padding:10px ;color:black" class="payrexx-modal-window" href="#"
			data-href="<?php echo  $string1 ?>">
			Payer mon tirage au sort ici...
		</a>
		
	
			<?php	$StrAccept =   "https://gsfranches-montagnes.ch/TourDuJura/PaiementAccepted.php?nom=".$_POST["nom"] ."&prenom=".$_POST["prenom"]."&email=".$_POST["email"]."&temps=".$_POST["temps"]."&Remarque=".$_POST["Remarque"]?>
			<?php	$StrRefused =  "https://gsfranches-montagnes.ch/TourDuJura/PaiementDecliened.php?nom=".$_POST["nom"] ."&prenom=".$_POST["prenom"]."&email=".$_POST["email"]."&temps=".$_POST["temps"]."&Remarque=".$_POST["Remarque"]?>
			
		<!-- Script lors de la validation du paiement !-->
		<script type="text/javascript">
			jQuery(".payrexx-modal-window").payrexxModal({
			hidden: function(transaction) {
				if (transaction.status == "confirmed") // authorized
				{
					location.href =<?php echo json_encode($StrAccept); ?>;
				}
				else
				{
					location.href =<?php echo json_encode($StrRefused); ?>;		
				}
			}
		});
		</script>

 <p class="titleCenter">Partenaire </p>
<fieldset>
<table width="100%">
<tr>
<td>
<center>
	<img src="images/logo_GSFM.jpg" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/bfm.jpg" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/mulebar.png" height="100px" alt=""  align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/lepays.png" height="60px" alt="" align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/Miserez.png" height="80px" alt="" align="center"  />
</center>
</td>
<td>
<Center>
	<img src="images/mobiliere.jpg" height="80px" alt="" align="center"  />
</center>
</td>
</tr>
</TABLE>
</fieldset>
</div>
</div>
</body>
</html>
   