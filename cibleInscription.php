
<html>
 <head>
<title>Redirection</title
</head>
   <body>
 <div id="corps">
	<h3> Merci pour votre inscription  </h3>
	</br> 
	<?php
	$con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
	mysqli_select_db($con ,'dxvv_jurachrono' );
$sql = 'INSERT INTO JOURNEETENERO (`Nom`, `Prenom`,`Telephone`,`Email`)
 VALUES
	(
	"'.$_POST['nom'].'", 
	"'.$_POST['prenom'].'", 
	"'.$_POST['telephone'].'", 
	"'.$_POST['email'].'");';
if (mysqli_query($con,$sql))
  {
mail($_POST['email'], 'Confirmation site web', "Bonjour ".$_POST['prenom']." ".$_POST['nom'] .","."\n".
	 "Votre inscription est enregistrée, rendez-vous le 17 octobre pour la journée Ténéro" );
  }
else
  {
  echo "Error insert : Informations" ;
  }  
	
	
     
?>
		 <a style="background:#dfdfdf ; Padding:10px ;color:black"  href="https://www.gsfranches-montagnes.ch/index.php">
			Retour au site Web
		</a>


<?php header('Location: https://www.gsfranches-montagnes.ch/confInscription.php'); ?>
</div>
</body>
</html>
   