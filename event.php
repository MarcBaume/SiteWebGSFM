<div id ="event">
	
		<center>
		<h2> Prochains événements </h2>  
		</center>
		  <table> 
		<th width="5%"> Date</th>
		<th width="15%"> Nom</th>
		<th width="15%"> Lieu</th>
		<?php

try
{

    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'MPCLW7DednoA', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video

    $reponse = $bdd->query('SELECT * FROM Event_2 ');
  
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>

	
	<tr>
		
	<td> <?php echo $donnees['date'] ?>  </td>
    <td>  <?php echo $donnees['nom']; ?></td> 
	<td>	<?php echo $donnees['lieu'];?> </td>
	</tr>
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>

</table>
</div>

