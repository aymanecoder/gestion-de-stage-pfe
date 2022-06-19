<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des utilisateurs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des utilisateurs </div>
          <div class="card-body mt-5">  

            <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_Utilisateur'])){ 
                try{
                  $id_Utilisateur = $_POST['id_Utilisateur']; 
                  $cmd = $connected->prepare("DELETE fROM `utilisateur` WHERE id_Utilisateur = $id_Utilisateur"); 
                  $cmd->execute(array("id_Utilisateur"=>$id_Utilisateur)); 
                  if($cmd == true){ ?>
                    <div class="alert alert-success" role="alert">
                      La supprission à été effectuer avec succés
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php 
                  }
                  else{?>
                    <div class="alert alert-danger" role="alert">
                      Erreur !
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php 
                  }
                } 
                catch(Exception $e)
                {
                  die('Erreur : '.$e->getMessage());
                }  
              }
            }
          ?>

          <?php 
            if(isset($_POST['btn_modification'])){
              if(!empty($_POST['id_Utilisateur'])){ 
                try{
                  $id_Utilisateur = $_POST['id_Utilisateur']; 
                  $Login = $_POST['Login']; 
                  $Role = $_POST['Role']; 
                  $Genre = $_POST['Genre']; 
                  $Nom = $_POST['Nom'];
                  $Prenom = $_POST['Prenom'];
                  $email = $_POST['email'];
                  $Telephone = $_POST['Telephone'];
                  $Nbr_acces = $_POST['Nbr_acces'];
                  $Date_acces = $_POST['Date_acces'];

                  $cmd = $connected->prepare("UPDATE `utilisateur` SET `Role` = ':Role', `Nom` = ':Nom', `Prenom` = ':Prenom', `Genre` = ':Genre', `Telephone` = ':Telephone', `email` = ':email', `Login` = ':Login', `Date_acces` = ':Date_accest', `Nbr_acces` = ':Nbr_acces' WHERE `utilisateur`.`id_Utilisateur` =:id_Utilisateur"); 

                  $cmd->execute(array(":id_Utilisateur"=>$id_Utilisateur, ":Login"=>$Login, ":Role"=>$Role,":Genre"=>$Genre, ":Nom"=>$Nom, ":Prenom"=>$Prenom, ":email"=>$email, ":Date_acces"=>$Date_acces, ":Nbr_acces"=>$Nbr_acces, ":Telephone"=>$Telephone, )); 
                  if($cmd == true){ ?>
                    <div class="alert alert-success" role="alert">
                      La modification à été effectuer avec succés
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php 
                  }
                  else{?>
                    <div class="alert alert-danger" role="alert">
                      Erreur !
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php 
                  }
                } 
                catch(Exception $e)
                {
                  die('Erreur : '.$e->getMessage());
                }  
              }
            }
          ?>




            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="25%">Login</th>
                  <th scope="col" width="20%">Role</th>
                  <th scope="col" width="25%">Genre</th>
                  <th scope="col" width="20%">#</th>
                </tr>
                <?php 

                   $cmd = $connected->query("SELECT * FROM `utilisateur` "); 
                         
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>

                <tr>
                          <th scope="row"><?php  echo $data["id_Utilisateur"]; ?></th>
                          <td><?php  echo $data["Login"]; ?></td>
                          <td><?php  
                                $cmd = $connected->query("SELECT * FROM `role` ");  
                                if($cmd){
                                  while ($data3 = $cmd->fetch()){
                                    echo $data3["Intitule"];
                                  }
                                }
                              ?></td>
                          <td><?php  echo $data["Genre"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_role<?php  echo $data["id_Utilisateur"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_role<?php  echo $data["id_Utilisateur"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content text-left">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="">Plus de details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="counter">
                                        <div class="row mt-4">
                                          <div class="col-12">
                                            <form action="test.html" method="POST" id="roleform">
                                                <div class="form-group row" >
                                                  <label for="inputLogin" class="col-sm-3 col-form-label">Login :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputLogin" class="col-sm-3 col-form-label">
                                                      <?php 
                                                       echo $data["Login"];

                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputRole" class="col-sm-3 col-form-label mt-1">Role :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputLogin" class="col-sm-3 col-form-label">
                                                      <?php 
                                                        $cmd = $connected->query("SELECT * FROM `role` ");  
                                                        if($cmd){
                                                          while ($data3 = $cmd->fetch()){
                                                            echo $data3["Intitule"];
                                                          }
                                                        }
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNom" class="col-sm-3 col-form-label">Nom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputNom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Nom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputPrenom" class="col-sm-3 col-form-label">Prenom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputPrenom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Prenom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputemail" class="col-sm-3 col-form-label">email :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputemail" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["email"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputTelephone" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Telephone"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNbr_accees" class="col-sm-3 col-form-label">Nbr_acces :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputNbr_acces" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Nbr_acces"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputDate_acces" class="col-sm-3 col-form-label">Date_acces :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputDate_acces" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Date_acces"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputGenre" class="col-sm-3 col-form-label mt-1">Genre :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputLogin" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Genre"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>  
                                </div>
                              </div>
                            </div>
                            
                            

                            <!-- btn-modifier -->
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_utilisateur<?php  echo $data["id_Utilisateur"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_utilisateur<?php  echo $data["id_Utilisateur"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_utilisateur" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modifierrole">Modifier l'utilisateur</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                     <div class="modal-body">
                                      <div class="counter">
                                        <div class="row mt-4">
                                          <div class="col-12">
                                            <form action="test.html" method="POST" id="roleform">
                                                <div class="form-group row" >
                                                  <div class="form-group row"> inserer les nouveaux donnees d'utilisateur" : <?php  echo $data["Login"];?> 
                                                  <input type="text" class="form-control mt-3 hidden" name="id_Utilisateur" id="id_Utilisateur" value="<?php  echo $data["id_Utilisateur"];?>"></div>
                                                  <label for="inputLogin" class="col-sm-3 col-form-label">Login :</label>
                                                  <div class="col-sm-9">
                                                      <input type="text" name="Login" class="form-control" id="Login" value="<?php  echo $data["Login"];?>">
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNom" class="col-sm-3 col-form-label">Nom :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputNom" class="form-control"
                                                      value=" <?php 
                                                      echo $data["Nom"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputPrenom" class="col-sm-3 col-form-label">Prenom :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputPrenom" class="form-control"
                                                      value=" <?php 
                                                      echo $data["Prenom"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row">    
                                                  <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-select" id="validationDefault04" name="Devision" id="Devision" required="">
                                                      <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                                                      <?php  

                                                        $cmd = $connected->query("SELECT * FROM `role` ");  
                                                        if($cmd){
                                                          while ($dat = $cmd->fetch()){?> 
                                                            <option value="<?php  echo $dat["id_Role"]; ?>"><?php  echo $dat["Intitule"]; ?></option><?php  
                                                          }
                                                        }
                                                      ?>
                                                    </select>
                                                  </div>    
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputemail" class="col-sm-3 col-form-label">email :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputemail" class="form-control"
                                                      value=" <?php 
                                                      echo $data["email"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputTelephone" class="form-control"
                                                      value=" <?php 
                                                      echo $data["Telephone"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNbr_accees" class="col-sm-3 col-form-label">Nbr_acces :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputNbr_acces" class="form-control"
                                                      value=" <?php 
                                                      echo $data["Nbr_acces"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputDate_acces" class="col-sm-3 col-form-label">Date_acces :</label>
                                                  <div class="col-sm-9">
                                                     <input for="inputDate_acces" class="form-control"
                                                      value=" <?php 
                                                      echo $data["Date_acces"];
                                                       ?>"
                                                      > 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputGenre" class="col-sm-3 col-form-label mt-1">Genre :</label>
                                                  <div class="col-sm-9">
                                                    <input for="inputLogin" class="form-control"
                                                        value=" <?php 
                                                        echo $data["Genre"];
                                                         ?>"
                                                        >
                                                  </div>  
                                                </div>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuller</button>
                                        <button type="submit" class="btn btn-primary" name="btn_modification" id="btn_modification">Modifier</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>  

                            <!-- btn-Suppression -->
                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_Utilisateur"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_Utilisateur"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer le role</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer le role <?php  echo $data["Login"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_Utilisateur" id="id_Utilisateur" value="<?php  echo $data["id_Utilisateur"];?>">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuller</button>
                                      <button type="submit" class="btn btn-danger" name="btn_supprimer" id="btn_supprimer">Supprimer</a></button>
                                    </div>
                                  </div>
                                </form>  
                              </div>
                            </div>
                            
                          </td>
                        </tr>

                      <?php 
                        
                      }
                      $cmd->closeCursor();
                    }


                ?>
                 
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
              </thead>
              <tbody>
            </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-dark" onclick='document.getElementById("intitule").focus();'>
              <i class="bx bx-x"></i>  <a href="index.php" style="color: white;">retour</a>
            </button>
            <button type="button" class="btn btn-primary" name="btn_enregistrer" id="btn_enregistrer">
              <i class="bx bxs-plus-square"></i><a href="page.php?lien=add_utilisateur" style="color: white;">ajouter un utilisateur</a>
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->    