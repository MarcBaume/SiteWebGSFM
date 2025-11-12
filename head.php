   <head>
 <link rel="icon" href="gsfm.png" type="image/png" sizes="32x32">

<meta property="og:description" content="course des franches, course, jura, franches-montagnes, le noirmont, course � pied, gsfm, groupe sportif, trail, course nature" />  
<meta property="og:image" content="/images/CouvertureClub.jpg" />
       <title>GSFM</title>
	 
<meta charset="utf-8"/> 
	
  <meta name="viewport" content=" maximum-scale=1.0, user-scalable=yes">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	     <meta name="viewport" content="width=device-width,min maximum-scale=1.0, user-scalable=yes">
 
		 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" media="only screen and (max-width: 400px)" href="/style/style4-mobil.css" />
<link rel="stylesheet" media="only screen and (min-width: 401px)" href="/style/style22.css" />
	<!--<link rel="stylesheet" media="screen" type="text/css" title="style" href="" />
 Import Leaflet CSS Style Sheet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
<!-- Import Leaflet JS Library -->
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<script src="js/prototype.js" ></script>
<script src="js/FonctionDefiChrono.js" ></script>
   </head>
   <body>
   <body>
 
 </br>
 <?php
 try
 {
     // On se connecte à MySQL
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=dxvv.myd.infomaniak.com;dbname=dxvv_gsfranchesmontagnesch1', 'dxvv_christopheJ', 'er3z4aet1234', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 }
 catch(Exception $e)
 {
     // En cas d'erreur précédemment, on affiche un message et on arrête tout
     die('Erreur : '.$e->getMessage());
 }
 
 ?>
 <table  style="width:100%";>
     <tr>
         <td>
              <a  ><img style="width:400px;" src="images/logo_GSFM.png"   alt=""  /></a>
         </td>
         <td>
            <table  style="display: block; float:right; margin:0px" >
                
                <tr>
                    <td>
                        <table  style="display: block; float:right; margin:0px" >
                            <tr>
                                <td>
                                    <a class="bouton" href="index.php"><i class="fa fa-home"  style= "margin: auto;font-size: 40px;" ></i> <a>
                                </td>
                                <td>
                                    <a class="bouton" href="Pages/club.php"><i class="fa fa-envelope-o"  style= "margin: auto;font-size: 40px;" ></i> <a>
                                </td>
                                <td>
                                <a class="bouton" href="Pages/photo.php"><i class="fa fa-camera"  style= "margin: auto;font-size: 40px;" ></i> <a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                        <?php
                            // On récupère tout le contenu de la table jeux_video
                            $reponse = $bdd->query('SELECT * FROM news  ORDER BY num ASC');
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch())
                            {?>
                                <tr>
                                    <td class="titleNews" style="margin-top:0px;">
                                        <i class="fa fa-bullhorn"  style= "font-size: 35px;"></i>
                                    </td>
                                    <td class="paragrapheNews" style="margin-top:0px;">
                                        <a > <?php echo $donnees['text'] ?> </a> 
                                    </td>
                                </tr>
                                <tr>
            
                                </tr>
                        <?php
                            }   
                        ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
     </tr>
 </table>
   <?php 
setlocale (LC_TIME, 'fr_FR.utf8','fra');?>
