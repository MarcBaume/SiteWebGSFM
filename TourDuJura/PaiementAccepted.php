<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


<div id="info">
<Center>
	<img src="images/LogoTourDuJura.jpg" width="70%" alt=""  align="center"  />
</center>

	<h3> Merci pour le paiement du tirage au sort : <?php echo $_GET["nom"] . " ".$_GET["prenom"]?> </h3>
	</br> 
	<?php
	$con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
	mysqli_select_db($con ,'dxvv_jurachrono' );
	$sql = 'INSERT INTO Tirage (`Nom`, `Prenom`,`Email`,`Remarque`,`Temps`)
	VALUES
	("'.$_GET["nom"].'", 
	"'.$_GET["prenom"].'",
	"'.$_GET["email"].'",
	"'.$_GET["Remarque"].'",
	"'.$_GET["temps"].'");';
	$result = mysqli_query($con,$sql);
?>
		 <a style="background:#dfdfdf ; Padding:10px ;color:black"  href="https://www.gsfranches-montagnes.ch/TourDuJura/index.php">
			Retour au site Web
		</a>

</div>
</div>
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
</tr>
</TABLE>
</body>
</html>