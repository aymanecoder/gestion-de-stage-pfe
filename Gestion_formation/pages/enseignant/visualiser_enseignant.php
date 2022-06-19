<?php session_start();
  include('connexion.php');

$edit=$_SESSION['id_user_GF'] ;
?>

<!DOCTYPE HTML>
<html>
	<head>
	
		<meta charset="utf_8" />
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<title>VISUALISER TOUS LES STAGES</title>
	
	</head>
	
	<div class="container">
		<div class="row"></div>
		<div class="row ">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="card">
					<div class="card-header"><h4>lISTE DES ENCADRANTS</h4></div>
					<div class="card-body">
						<form action="pages/enseignant/validation_ens.php" method="POST">
							<table class="table datatable">
				              <thead>
				                <tr>
				                  <th scope="col" width="5%"></th>
				                  <th scope="col" width="10%">#</th>
				                  <th scope="col" width="20%">nom</th>
				                  <th scope="col" width="10%">prenom</th>
				                  <th scope="col" width="10%">Intitulé_du_sujet</th>
				                  <th scope="col" width="10%">Description du sujet</th>
				                </tr>
				                <?php 

				                   $cmd = $connected->query("SELECT * from `encadrent`,`sujet` WHERE sujet.id_encadrent=encadrent.id_encadrent "); 
				                         
				                    if($cmd){
				                      while ($data = $cmd->fetch()){
				                ?>
								<tbody>
				                <tr>	
				                	  <th scope="row"><?php  echo $data["id_sujet"]; ?></th>
			                          <td><?php  echo $data["nom"]; ?></td>
			                          <td><?php  echo $data["prenom"]; ?></td>
			                          <td><?php  echo $data["Intitulé_du_sujet"]; ?></td>
			                          <td><?php  echo $data["Description du sujet"]; ?></td>   
			                	</tr>

				                      <?php 
				                      }
				                      $cmd->closeCursor();
				                      }
				                      ?>
				              </tbody>
				            </table>
				            <h3> CHOISIR LES STAGES A VALIDER</h3>
				            <table class="table datatable">
		
    
    <?php
			
				$req1="select * from sujet ";
				$resultat=mysqli_query($link,$req1);

				$requ2="select * from encadrent ";
				$resultat2=mysqli_query($link,$requ2);

				while($data=mysqli_fetch_assoc($resultat) and $row=mysqli_fetch_assoc($resultat2)){

					$id_sujet=$data['id_sujet'];
					$sujet=$data['Intitulé_du_sujet'];
					$desc=$data['Description du sujet'];

					$id_encadrent=$row['id_encadrent'];
					$nom=$row['nom'];
					$prenom=$row['prenom'];
						echo "<tr>";
					echo "<td ><input type=\"checkbox\" name=\"stage[]\" value=\"".$sujet."\">$sujet</td>";
					echo "<td>$nom $prenom</td>";
					echo "</tr>";
					}			
			?>

								</table>

				        <a href="pages/enseignant/validation_ens.php"><button type="submit" class="btn btn-primary" name="btn_valider" id="btn_valider">valider stage
				            </button></a>
				          

		
		</form>
	


	
				            </div>

				         
					</div>
				</div>
			</div>
		</div>
	</div>
</main><!-- End #main --> 


	




      



				   	
				  
					

			
	

	


















				
			
				

            
		


   

		
		
		

		
			
			




	








		


     
		
	













		

	






	


