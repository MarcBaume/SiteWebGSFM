<div id ="event">
	
		<center>
		<h2> Prochains �v�nements </h2>  
		</center>
		  <table> 
		<th width="5%"> Date</th>
		<th width="15%"> Nom</th>
		<th width="15%"> Lieu</th>
		<?php

try
{

    // On se connecte � MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'MPCLW7DednoA', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On r�cup�re tout le contenu de la table jeux_video

    $reponse = $bdd->query('SELECT * FROM Event_2 ');
  
    // On affiche chaque entr�e une � une
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
    
    $reponse->closeCursor(); // Termine le traitement de la requ�te

}
catch(Exception $e)
{
    // En cas d'erreur pr�c�demment, on affiche un message et on arr�te tout
    die('Erreur : '.$e->getMessage());
}


?>

</table>
</div>

