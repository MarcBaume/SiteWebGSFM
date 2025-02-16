<?php
	$con = mysqli_connect('dxvv.myd.infomaniak.com', 'dxvv_christopheJ', 'er3z4aet1234');
 
	// Nombre de coureur dans la base de donnée
	mysqli_select_db($con ,'dxvv_jurachrono' );

  $sql2 = 'TRUNCATE TABLE Position2;';
   

 $sql = 'INSERT INTO Position2 (`Nom`,`Prenom`,`Localite`)
    VALUES
	(
	"'.$_REQUEST['Lng'].'", 
	"'.$_REQUEST['Lat'].'", 
	"'.$_REQUEST['Heure'].'");';

    // Requette Sql
	if (mysqli_query($con,$sql2))
  {
 
    if (mysqli_query($con,$sql))
    {
      print( 1);
    }
    else
    {
      print( -2);
    }
  }
else
  {
    print( -1);
  echo "Error insert : Informations" . mysql_error();
  }  

?>