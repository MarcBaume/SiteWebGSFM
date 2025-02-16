<?php
  include("Header.php"); 
?>
   <body>
  <div id="corps">


 <div  id="TableauResulat">


<?	

$pathFile = 'File/Horaire.csv';
	
if (file_exists($pathFile)) 
{
	if (($handle = fopen($pathFile, "r")) !== FALSE) 
	{
		?>
		<div class ="TableResult" >
		<Table style="width:50%;">
			<tr onClick="ClickAllRows2(event)" style="cursor: pointer; background-color: #b3f3fa;">
				<td>
					<i class="fa fa-user" ></i> 
				</td>
				<td>
					Afficher le tableau de déplacement
				</td>
		 <tr>
		 </table>
		<Table style="visibility: collapse"  id="TableHoraire"> 
	
				<?
		
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
		{
			$num = count($data)-1;
			if ($j==0)
			{ ?>
				<tr >
			
						<?for ($c=0; $c < $num; $c++)
						{
							if ( $c!=7 && $c!=5 && $c!=8  )
							{ ?>
							<th><?php  echo $data[$c]?> </th><?php
							}
						}?>
				</tr><?
			}
			else
			{
			$ID = $data[0];
			?>
			
				<tr >
					<?for ($c=0; $c < $num; $c++)
					{	
						if ( $c!=7 && $c!=5  && $c!=8   )
							{?>
						<td><?php  echo $data[$c]?> </td><?php
							}
					}?>
						
				</tr>
			
		
	<?
			}
		
		}

		?>
	
			</table>
	<?
	}
}
else
{
echo 'fichier existe pas ';
}?>
		</div>
</div>
</body>
</html>
<script>
function ClickAllRows2(event)
    {  
	

			
			document.getElementById("TableHoraire").style.visibility = "visible" ;
	}
</script>
								

