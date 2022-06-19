<?php
 require_once 'pages/admin/header_admin.php'; ?>

<main id="main" class="main">
  <?php 
            if(isset($_POST['btn_modification'])){
              var_dump($_POST);
              if(!empty($_POST['id_ens'])){ 
                try{
                  $id_ens = $_POST['id_ens']; 
                  $Nom = $_POST['Nom']; 
                  $Prénom = $_POST['Prénom'];
                  $Titre_sujet = $_POST['Titre_sujet'];
                  $adresse_mail = $_POST['adresse_mail'];

                  $cmd = $connected->prepare("UPDATE `enseignat` SET `Nom`=:Nom, `Prénom`=:Prénom, `Titre_sujet`=:Titre_sujet, `adresse_mail`=:adresse_mail WHERE `enseignat`.`id_ens`=:id_ens"); 
                  $cmd->execute(array(":id_ens"=>$id_ens,":Nom"=>$Nom, ":Prénom"=>$Prénom, ":Titre_sujet"=>$Titre_sujet, ":adresse_mail"=>$adresse_mail)); 

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

           <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_ens'])){ 
                try{
                  $id_ens = $_POST['id_ens']; 
                  $cmd = $connected->prepare("DELETE fROM `enseignat` WHERE id_ens = $id_ens"); 
                  $cmd->execute(array("id_ens"=>$id_ens)); 
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
  <div class="pagetitle">
    <h1>Listes des enseigants</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des enseigants</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des enseigants </div>
          <div class="card-body mt-5">  

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="25%">Prénom</th>
                  <th scope="col" width="20%">Nom</th>
                  <th scope="col" width="25%">mail</th>
                  <th scope="col" width="20%">#</th>
                </tr>
                <?php 

                   $cmd = $connected->query("SELECT * FROM `enseignat` "); 
                         
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>



                <tr>
                          <th scope="row"><?php  echo $data["id_ens"]; ?></th>
                          <td><?php  echo $data["Prénom"]; ?></td>
                          <td><?php  echo $data["Nom"]; ?></td>
                          <td><?php  echo $data["adresse_mail"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_Nom<?php  echo $data["id_ens"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_Nom<?php  echo $data["id_ens"];?>" tabindex="-1" role="dialog" aria-labelledby="datail_Nom" aria-hidden="true">
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
                                                  <label for="inputNom" class="col-sm-3 col-form-label">Nom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputNom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Nom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputNom" class="col-sm-3 col-form-label mt-1">Prénom :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputPrénom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Prénom"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputadresse_mail" class="col-sm-3 col-form-label">adresse_mail :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputadresse_mail" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["adresse_mail"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                
                                                <div class="form-group row" >
                                                  <label for="inputCIN" class="col-sm-3 col-form-label">Titre sujet :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputTitre_sujet" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Titre_sujet"];
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_enseignant<?php  echo $data["id_ens"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_enseignant<?php  echo $data["id_ens"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_enseignant" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate >
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modifierrole">Modifier le enseignant</h5>
                                        <input type="text" class="form-control hidden" name="id_ens" id="id_ens" value="<?php echo $data["id_ens"] ?>">
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
                                                    <label for="inputTelephone" class="col-sm-3 col-form-label">Nom :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Entrer le Nom...">
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNom" class="col-sm-3 col-form-label">Prénom :</label>
                                                  <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="Prénom" id="Prénom" placeholder="Entrer le  Prénom...">
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputadresse_mail" class="col-sm-3 col-form-label">adresse_mail :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="adresse_mail" id="adresse_mail" placeholder="Entrer le adresse_mail...">
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputmail" class="col-sm-3 col-form-label">Titre sujet :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="Titre_sujet" id="Titre_sujet" placeholder="Entrer l'Titre_sujet...">
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
                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_ens"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_ens"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer le enseignant</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer le enseignant <?php  echo $data["Nom"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_ens" id="id_ens" value="<?php  echo $data["id_ens"];?>">
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
              <i class="bx bxs-plus-square"></i><a href="page.php?lien=add_enseignant" style="color: white;">ajouter un enseignant</a>
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->    





                                                
