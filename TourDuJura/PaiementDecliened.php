<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


<div id="info">
<Center>
	<img src="images/LogoTourDuJura.jpg" width="70%" alt=""  align="center"  />
</center>

	<h3> Mal Heureusement votre paiement a été refusé : <?php echo $_GET["nom"] . " ".$_GET["prenom"]?> </h3>
	</br> 

		 <a style="background:#dfdfdf ; Padding:10px ;color:black"  href="https://www.gsfranches-montagnes.ch/TourDuJura/index.php">
			Retour au site Web
		</a>

</div>
</div>
</body>
</html>