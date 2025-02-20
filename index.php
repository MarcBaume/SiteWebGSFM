<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<?php include("head.php"); ?>
 
<div id="image">
<script>
var myVar=setInterval(function(){myTimer()},4000);
var MonTableau = ["membre1.png","membre2.png","membre3.png","membre4.png", "membre.png"];
var i = 0;
function myTimer() {		
	i+= 1; 
	if (i>4)
	{
	i=0;
	}

	var link = "url('images/" + MonTableau[i]+"')";
document.getElementById("image").style.backgroundImage = link
  
}
</script>
  </div>
  <table   style="width:90% ; margin : auto"  > 
    <tr>
        <td class="title">
        <a >       <i class="fa fa-calendar-o"  style= "font-size: 24px;margin:10px;"></i>  Manifestations 
        </td>
    </tr>
    <tr>
        <td  class="paragraphe2">
    <table style="width: 90%; margin:auto;">
    <?php
        $reponse = $bdd->query('SELECT * FROM calendrier  ORDER BY ind ASC');
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
            ?>
            <tr>
                <td style="width:100%" >
                    <table style="width: 90%;margin:auto;margin-top : 10px">
                            <tr >
                                <td class="title" >
                                    <a > <?php echo $donnees['Titre'] ?> </a> 
                                </td>
                            </tr>
                            <tr  >
                                <td class="paragraphe" style="margin-top:0px;">
                                    <table>
                                        <tr>
                                            <td style ="width:50%">
                                                <table>
                                                    <tr>
                                                        <td style="width : 50px">
                                                            <i class="fa fa-calendar-o"  style= "font-size: 35px;"></i>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $donnees['date']  ?><br/></p>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        if (strlen( $donnees['heure'])>1)
                                                        {
?>
                                                    <tr>
                                            
                                                        <td style="width : 50px">
                                                            <i class="fa fa-clock-o"  style= "font-size: 35px;"></i>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $donnees['heure']  ?><br/></p>
                                                        </td>
                                                       
                                                    </tr>
                                                    <?php
                                                        }
?>
                                                    <tr>
                                                        <td style="width : 50px">
                                                            <i class="fa fa-map-marker"  style= "font-size: 35px;"></i>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $donnees['lieu']  ?><br/></p>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        if (strlen( $donnees['pathWeb'])>1)
                                                        {
?>
                                                    <tr>
                                                        <td style="width : 50px">
                                                            <i class="fa fa-info-circle"  style= "font-size: 35px;"></i>
                                                        </td>
                                                        <td>
                                                            <table style="width: 100%;cursor:pointer;"  onclick="location.href='<?php echo $donnees['pathWeb']  ?>'">
                                                                <Tr>
                                                                    <td>
                                                                        <p><span style="text-decoration: underline;">plus informations..</span></p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </td>
                                            <td style ="width:50%">
                                                <img class="ImgVignette" style="width:500px" src=<?php echo $donnees['pathImage']  ?>  alt=""  />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php 
            }
                $reponse->closeCursor(); // Termine le traitement de la requête
            ?>
        </table>
        </td>
        </tr>
        </table>
<table   style="width:90% ; margin : auto; margin-top : 40px"  > 
    <tr>
        <td class="title">
	        Entrainements 
        </td>
    </tr>
    <tr>
        <td  class="paragraphe2">
<?php

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM Entrainement  ORDER BY num ASC');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
        ?>
        <div style="display: inline-block; margin : 10px ;">
            <table style="width:400px">
                <tr>
                    <td class="title"  >
                       <?php echo $donnees['jour'] ?> </a> 
                    </td>
                </tr>
                <tr>
                    <td  class="paragraphe">
                        <table>
                            <tr>
                                <td style="width : 50px">
                                    <i class="fa fa-map-marker"  style= "font-size: 35px;"></i>
                                </td>
                                <td>
                                    <p><?php echo $donnees['lieu']  ?><br/></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width : 50px">
                                    <i class="fa fa-clock-o"  style= "font-size: 35px;"></i>
                                </td>
                                <td>
                                    <p><?php echo $donnees['debut']  ?> - <?php echo $donnees['fin'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width : 50px">
                                
                                </td>
                                <td>
                                    <p><?php echo $donnees['activite']  ?></p>
                                </td>
                            </tr>
                        </table>
                    
                    </td>
                </tr>
            </table>
    </div>

    <?php 
    }
        $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
        </td>
    </tr>
</table>
  </div>
    <table style="width: 100%;margin-top : 40px">
        <Tr>
            <td>
				<table style="width: 80%;margin:auto;cursor:pointer;"  onclick="location.href='club.php'">
					<Tr>
                        <td  class="title">
                            <a>Le Club</a>
                        </td>
                    </tr>
					<Tr >
                      <td class="paragraphe2">
                            <a><img src="vignettes/VignettesClub.png" style="width:500px"   alt=""  /></a>
                        </td>
                    </tr>
                 
                </table>
            </td>
		</tr>

	</table>
  
         
   <?php include ("sponsors.php"); ?>
   <?php include ("footer.php"); ?>
</body>
</html>

