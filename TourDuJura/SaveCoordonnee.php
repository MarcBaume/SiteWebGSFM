<?php
$myfile = fopen("File/coordonnee.txt", "a");
$txt = $_POST["fNom"] . ";". $_POST["fLat"] .";" . $_POST["fLon"] ;
$pathFileInfo = 'File/coordonnee.txt';
$TabMemoryPoint = array();
	if (file_exists($pathFileInfo))
	{
		if (($handle = fopen($pathFileInfo, "r")) !== FALSE) 
		{
			$cmpt =0;

			while (($datatxt = fgetcsv($handle, 1000, ";")) !== FALSE) 
			{
				// SI CHamps sélectionner 
				if ($datatxt[0] == $_REQUEST['ModifNom'])
				{
			
					$datatxt[3] = $_REQUEST['ModifOffsetX'];
					$datatxt[4] = $_REQUEST['ModifOffsetY'];
				}
				$TabMemoryPoint[] = $datatxt;

			}
			
			fclose($pathFileInfo);
			// Supression fichier existant
			unlink($pathFileInfo);
			
			$myfile = fopen($pathFileInfo,"w");
			// Ecriture du nouveau fichier avec les modifications
			foreach ($TabMemoryPoint as $value) {
			$line = "";
				foreach ($value as $col) {
					$line = $line .$col.';';
				}
				fwrite($myfile, $line . "\n");
			}
		}
		
	}



?>