<main>



<form  method="post">
		<table>
		       <tr><br>stage a encadrer</tr>
				<?php 
			 include('connexion.php');
				if(isset($_POST['submit'])){
					
					   if(!empty($_POST['stage'])){
					   	foreach ($_POST['stage'] as  $cle=>$valeur) {
					   	echo "<tr>";
						echo " <td>$valeur</td> ";	
						
						echo"</tr>";
					   	}}}
					   	echo"<input type=\"submit\" name=\"sub\" value=\"inserer\">";

					   	/*foreach ($_POST['stage'] as  $cle=>$valeur) {
					   	echo "<tr>";
	              $note=$_POST["'".$valeur."'"];
	                $sql="INSERT INTO `stage_encadrer`(  `note_finale`,`stage_a_encadrer`) VALUES ('".$note."','".$valeur."')";
						$resu=mysqli_query($link,$sql);
						echo "</tr>";
					   	}
					   }
					}*/

			
					?>	
		</table>   	
	</form>

</main>
