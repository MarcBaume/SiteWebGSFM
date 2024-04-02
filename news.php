<div id="news">
 
<center><b>News</b></center>
<?php
try
{

    // On se connecte Ã  MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES latin1'));

   // On rÃ©cupÃ¨re tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM news');
    
    // On affiche chaque entrÃ©e une Ã  une
    while ($donnees = $reponse->fetch())
    {
    ?>
		<Fieldset>
		<?php $date= substr($donnees['date'], 0, -9) ;/* echo substr('abcdef', 1, 3);  // bcd */?> 
		<?php $annee=substr($date, 0, 4); ?>
		<?php $mois=substr($date, 5, 2);?>
		<?php switch ($mois)
		{
			case "01";
			$mois= " janvier";
			break;
			case "02";
			$mois= " férvrier";
			break;
			case "03";
			$mois= " mars";
			break;
			case "04";
			$mois= " avril";
			break;
			case "05";
			$mois= " mai";
			break;
			case "06";
			$mois= " juin";
			break;
			case "07";
			$mois= " juillet";
			break;
			case "08";
			$mois= " aout";
			break;
			case "09";
			$mois= " septembre";
			break;
			case "10";
			$mois= " octobre";
			break;
			case "11";
			$mois= " novembre";
			break;
			case "12";
			$mois= " décembre";
			break;
			}
			?>
		
		<?php $jour=substr($date, 8, 2);?>
	
		
	<?php echo "le ". $jour . $mois. " ".$annee; ?>  </br></br>
        <?php echo  $donnees['text'];?> <br/></br>
		 <?php echo $donnees['Auteur'];?>
		</Fieldset>
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requÃªte

}
catch(Exception $e)
{
    // En cas d'erreur prÃ©cÃ©demment, on affiche un message et on arrÃªte tout
    die('Erreur : '.$e->getMessage());
}


?>

</div>