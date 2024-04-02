
<?php
//Variable - à remplacer par vos identifiants
$host='mysql.gsfranches-montagnes.ch';
$user='dxvv_christopheJ';
$pass='er3z4aet1234';
$db='gsfranchesmontagnesch1';
$separator=",";

//Connecter à la DB
$DBLink=mysql_connect ($host, $user, $pass);
mysql_select_db($db, $DBLink);

//Extraire le nom des colonnes
$rsColumn = mysql_query("SHOW COLUMNS FROM camp");
$columnLine="";
$columnCount=0;
if ($rsColumn) {
    if (mysql_num_rows($rsColumn) > 0) {
        while ($row = mysql_fetch_assoc($rsColumn)) {
            $columnLine .= $row['Field'].$separator;
            $columnCount++;
        }
        $columnLine .="\n";
    }
}

//Extraire les données
$rsData=mysql_query("SELECT * FROM camp ORDER BY ID ASC");
$dataLine="";
while ($row = mysql_fetch_array($rsData)) {
    for ($i = 0; $i < $columnCount; $i++) {
        $dataLine.=$row[$i].$separator;
    }
    $dataLine.="\n";
}

//Envoyer le contenu au navigateur internet
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=search_results.csv");
echo $columnLine.$dataLine;
exit;
?>