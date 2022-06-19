<?php 
  
  if(!empty($_SESSION['id_user_GF'])){
    $cmd_user = $connected->query("SELECT U.*, Intitule FROM `utilisateur` U
    INNER JOIN role R On R.id_Role=U.Role 
    where id_Utilisateur = '".$_SESSION['id_user_GF']."'"); 
                         
    if($cmd_user){
      while ($data = $cmd_user->fetch()){  
        $Nom_user = $data['Nom'].' '.$data['Prenom']; 
        $libelle_role =  $data['Intitule']; 
      }
      $cmd_user->closeCursor();
    }

  }
	

?>