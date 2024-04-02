	   <?php

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=mysql.gsfranches-montagnes.ch;dbname=gsfranchesmontagnesch1', 'christopheJunker', 'er3z4aet', $pdo_options);
    
	$req = $bdd->prepare('INSERT INTO Logo(Nom,Prenom, A, B, C, D, E, F,G,H,I,J,K, Remarque) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	$req->execute(array(

	$_POST['Nom'],
	$_POST['Prenom'],
	$_POST['A'],
	$_POST['B'],
	$_POST['C'],
	$_POST['D'],
	$_POST['E'],
	$_POST['F'],
	$_POST['G'],
	$_POST['H'],
	$_POST['I'],
	$_POST['J'],
	$_POST['K'],
	$_POST['Remarque']
	));
	
	header("Location: club.php")
	?>