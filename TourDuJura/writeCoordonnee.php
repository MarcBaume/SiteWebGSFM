<?php
$myfile = fopen("File/coordonnee.txt", "a");
$txt = $_POST["fNom"] . ";". $_POST["fLat"] .";" . $_POST["fLon"] ;


fwrite($myfile, $txt . "\n");
 header('Location: ReadGpx.php');
?>