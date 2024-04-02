</br><?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    // On récupère tout le contenu de la table jeux_video

    $reponse = $bdd->query('SELECT * FROM sponsors');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
	


	<?php
	
	 $chemin= "image_sponsor/".$donnees['photo'];
echo '<a href="'.$donnees['liens'].'"target="_blank"><img src="'.$chemin.'" alt="" /Height=100px></a>'; 
 
?>

  <?php }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

?>