
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des services</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">



      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des services  </div>

          <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_Service'])){ 
                try{
                  $id_Service = $_POST['id_Service']; 
                  $cmd = $connected->prepare("DELETE fROM `division` WHERE id_Service = $id_Service"); 
                  $cmd->execute(array("id_Service"=>$id_Service)); 
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
              if(!empty($_POST['id_Service'])){ 
                try{
                  $id_Service = $_POST['id_Service']; 
                  $division = $_POST['division']; 
                  $Nom_fr = $_POST['Nom_fr']; 
                  $Nom_ar = $_POST['Nom_ar']; 
                  $Description = $_POST['Description']; 
                  $cmd = $connected->prepare("UPDATE `Division` SET `Division` = ':Division', `Nom_fr`=:Nom_fr, `Nom_ar`=:Nom_ar, `Description`=:Description WHERE `Division`.`id_Service`=:id_Service"); 

                  $cmd->execute(array(":Division"=>$Division, "id_Service"=>$id_Service, ":Nom_fr"=>$Nom_fr, ":Nom_ar"=>$Nom_ar,":Description"=>$Description)); 
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

              

          <div class="card-body mt-5">  
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="25%">Division</th>
                  <th scope="col" width="20%">Nom_fr</th>
                  <th scope="col" width="20%">Nom_ar</th>
                  <th scope="col" width="20%">#</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  /*$affich = $connected->query("SELECT Nom_fr FROM `division` D
                            INNER JOIN service S On D.id_Division=S.Division");*/

                   $cmd = $connected->query("SELECT * FROM `service` "); 
                         
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>

                        <tr>
                          <th scope="row"><?php echo $data["id_Service"] ?></th>
                          <td><?php  echo $data["Division"] ?></td>
                          <td><?php  echo $data["Nom_fr"]; ?></td>
                          <td><?php  echo $data["Nom_ar"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_role<?php  echo $data["id_Service"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_role<?php  echo $data["id_Service"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_role" aria-hidden="true">
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
                                                  <label for="inputDivision" class="col-sm-3 col-form-label">Division :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputDivision" class="col-sm-3 col-form-label">
                                                      <?php echo $data["Division"]; ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputNom_fr" class="col-sm-3 col-form-label">Nom_fr :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputNom_fr" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Nom_fr"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputNom_ar" class="col-sm-3 col-form-label mt-1">Nom_ar :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputNom_fr" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Nom_ar"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDescription" class="col-sm-3 col-form-label mt-1">Description :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputNom_fr" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Description"];
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_role<?php  echo $data["id_Service"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_role<?php  echo $data["id_Service"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modifierrole">Modifier service</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST" id="roleform">
                                       <div class="modal-body">
                                        <div class="counter">
                                          <div class="row mt-4">
                                            <div class="col-12">
                                              <div class="form-group row"> inserer les nouveaux donnees du service : <?php  echo $data["Nom_fr"];?> 
                                                <input type="text" class="form-control mt-3 hidden" name="id_Service" id="id_Service" value="<?php  echo $data["id_Service"];?>">
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputRole" class="col-sm-3 col-form-label">Division</label>
                                                <div class="col-sm-9">
                                                  <select class="form-select" id="validationDefault04" name="Devision" id="Devision" required="">
                                                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                                                    <?php  

                                                      $cmd = $connected->query("SELECT * FROM `division` ");  
                                                      if($cmd){
                                                        while ($dat = $cmd->fetch()){?> 
                                                          <option value="<?php  echo $dat["id_Division"]; ?>"><?php  echo $dat["Nom_fr"]; ?></option><?php  
                                                        }
                                                      }
                                                    ?>
                                                  </select>
                                                </div>    
                                              </div>
                                              <div class="form-group row" >
                                                <label for="inputNom_fr" class="col-sm-3 col-form-label">Nom_fr :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="Nom_fr" class="form-control" id="Nom_fr" value="<?php  echo $data["Nom_fr"];?>">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputNom_ar" class="col-sm-3 col-form-label mt-1">Nom_ar :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="Nom_ar" class="form-control mt-3" id="Nom_ar" value="<?php  echo $data["Nom_ar"];?>">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputDescription" class="col-sm-3 col-form-label mt-1">Description :</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="5" name="Description" id="Description"><?php  echo $data["Description"];?></textarea>
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
                                  </form>
                                </div>
                              </div>
                            </div>  

                            <!-- btn-Suppression -->

                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_Service"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_Service"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer dvision</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer le role <?php  echo $data["Nom_fr"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_Service" id="id_Service" value="<?php  echo $data["id_Service"];?>">
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
               
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-dark" onclick='document.getElementById("Nom_fr").focus();'>
              <i class="bx bx-x"></i>  <a href="index.php" style="color: white;">retour</a>
            </button>
            <button type="button" class="btn btn-primary" name="btn_enregistrer" id="btn_enregistrer">
              <i class="bx bxs-plus-square"></i> <a href="page.php?lien=add_service" style="color: white;">ajouter un service</a>  
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->