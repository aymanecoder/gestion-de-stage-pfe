<?php session_start();
  include('connexion.php');

?>
<form method="post" class="nass">
	
<table class="aymen">

 <?php 
	  
		
			if(isset($_POST['btn_valider'])){
				   if(!empty($_POST['stage'])){
				   	foreach ($_POST['stage'] as  $cle=>$valeur) {
				   	echo "<tr>";
					echo " <td>$valeur</td> ";	
					
					echo"</tr>";
					
				   	}}}?>

	       <tr><br>stage a encadrer</tr>
			<td><select name="validation" >
<?php

				$sql="SELECT `Intitulé_du_sujet` FROM `sujet` ";
				$resu=mysqli_query($link,$sql);
				$row=mysqli_fetch_assoc($resu);
				while ($row=mysqli_fetch_assoc($resu)) {
echo '<option value='.$row["id_sujet"].'>';
echo $row["Intitulé_du_sujet"];
echo'</option>';
}
?>
</select>
</td>
          <td><select name="validation" size="1">
              <option value="valider">VALIDER</option>
              <option value="non_valider">NON VALIDER</option>
              </select></td>
              <td><input type="number" name="note"></td>
<?php echo "</tr>";
 ?>

 <?php 

if (isset($_POST['valider'])) {
	$edit = $_SESSION['id_user_GF'] ;
	$validation=$_POST['validation'];
	$note=$_POST['note'];
	$sql3="UPDATE `stage` SET `validation`='".$validation."',`note`='".$note."' where id_ens='".$edit."'";
	$resu=mysqli_query($link,$sql3);
	
}
 ?>

	  


<br><br>
<input type="submit" name="valider" value="valider">	
</table>			   	
</form>
</body>
</html>
<style type="text/css">
	


	.nass{ 
		background-color: #5FAADF;
		padding: 20px;
		text-align: center;
		width: 80%;
		margin-left: auto;
		margin-right: auto;
	}
	.aymen{
		width: 60%;
		background-color: 
		margin-left: auto;
		margin-right: auto;

	}
</style>











 

              







					
				   	
				   	
	
  

				 

		
				

























 

              







					
				   	
				   	
	
  

				 

		
				



























 

              







					
				   	
				   	
	
  

				 

		
				











