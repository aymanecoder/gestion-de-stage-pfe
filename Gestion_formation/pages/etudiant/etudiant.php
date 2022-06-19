
<?php
 require_once 'pages/admin/header_admin.php'; ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des etudiant</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des etudiant</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des etudiant </div>
          <div class="card-body mt-5">  

            <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_etudiant'])){ 
                try{
                  $id_etudiant = $_POST['id_etudiant']; 
                  $cmd = $connected->prepare("DELETE fROM `candidat` WHERE id_etudiant = $id_etudiant"); 
                  $cmd->execute(array("id_etudiant"=>$id_etudiant)); 
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
              var_dump($_POST);
              if(!empty($_POST['id_etudiant'])){ 
                try{
                  $id_etudiant = $_POST['id_etudiant']; 
                  $CIN = $_POST['CIN']; 
                  $Service = $_POST['Service']; 
                  $di = $_POST['di'];
                  $Nom = $_POST['Nom']; 
                  $Prenom = $_POST['Prenom'];
                  $Date_naissance = $_POST['Date_naissance'];
                  $Email = $_POST['Email'];

                  $cmd = $connected->prepare("UPDATE `candidat` SET `Service`=:Service, `CIN`=:CIN, `Nom`=:Nom, `Prenom`=:Prenom, `di`=:di, `Date_naissance`=:Date_naissance, `email`=:Email WHERE `candidat`.`id_etudiant`=:id_etudiant"); 
                  $cmd->execute(array(":id_etudiant"=>$id_etudiant, ":CIN"=>$CIN, ":Service"=>$Service,":di"=>$di, ":Nom"=>$Nom, ":Prenom"=>$Prenom, ":Date_naissance"=>$Date_naissance, ":Email"=>$Email)); 

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
                  <th scope="col" width="25%">Nom</th>
                  <th scope="col" width="20%">Prenom</th>
                  <th scope="col" width="25%">Diplome</th>
                  <th scope="col" width="20%">#</th>
                </tr>
                <?php 
                     
                   $cmd = $connected->query("SELECT * FROM `etudient` "); 
                         
                    if($cmd){
                      while ($data =$cmd->fetch()){
                ?>
                <tr>
                          <th scope="row"><?php  echo $data["id_etudiant"]; ?></th>
                          <td><?php  echo $data["nom"]; ?></td>
                          <td><?php echo $data["prenom"]; ?>  </td>
                          <td><?php  echo $data["diplôme"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_etudiant<?php  echo $data["id_etudiant"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_etudiant<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_etudiant" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content text-left">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="">Plus de</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="counter">
                                        <div class="row mt-4">
                                          <div class="col-12">
                                                <div class="form-group row" >
                                                  <label for="inputnom" class="col-sm-3 col-form-label">Nom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputnom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["nom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputRole" class="col-sm-3 col-form-label mt-1">Prenom :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputnom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["prenom"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                              
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputnom" class="col-sm-3 col-form-label">Prenom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputPrenom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["prenom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                               
                                         
                                                </div>
                                               
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                  </form>  
                                </div>
                              </div>
                            </div>
                            
                            

                            <!-- btn-modifier -->
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_candidat<?php  echo $data["id_etudiant"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_candidat<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_candidat" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate >
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modifierrole">Modifier le candidat<input type="text" class="form-control hidden" name="id_etudiant" id="id_etudiant" value="<?php echo $data["id_etudiant"] ?>"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="counter">
                                          <div class="row mt-4">
                                            <div class="col-12">
                                              <div class="card-body">
                                                <div class="form-group row" >
                                                  <label for="inputnom" class="col-sm-3 col-form-label">apogee   :</label>
                                                  <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="apogee  " id="apogee  " placeholder="Entrer le apogee ...">
                                                  </div>
                                                </div>
                                              
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNom" class="col-sm-3 col-form-label">Nom :</label>
                                                  <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Entrer le  nom...">
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputPrenom" class="col-sm-3 col-form-label">Prenom :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="Prenom" id="Prenom" placeholder="Entrer le Prenom...">
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group row" >
                                                    <label for="inputTelephone" class="col-sm-3 col-form-label">email :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="email" id="email" placeholder="Entrer le email...">
                                                    </div>
                                                </div>
                                      
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuller</button>
                                          <button type="submit" class="btn btn-primary" name="btn_modification" id="btn_modification">Modifier</button>
                                      </div>
                                  </div>
                                </form>
                              </div>
                            </div>  

                            <!-- btn-Suppression -->
                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_etudiant"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer le etudient</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer le candidat <?php  echo $data["apogee"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_etudiant" id="id_etudiant" value="<?php  echo $data["id_etudiant"];?>">
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
              <i class="bx bxs-plus-square"></i><a href="page.php?lien=add_candidat" style="color: white;">ajouter un etudient</a>
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->    





                                                
