	   <?php
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
    
	$req = $bdd->prepare('INSERT INTO sondage(avis,remarque) VALUES(?, ?)');
	$req->execute(array(

	$_POST['avis'],
	$_POST['ameliorer'],

	));
	header("Location: resultat.php")
	?>