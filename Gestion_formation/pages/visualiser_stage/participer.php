<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des participations</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des participations</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">



      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des participations  </div>

          <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_Participer'])){ 
                try{
                  $id_Participer = $_POST['id_Participer']; 
                  $cmd = $connected->prepare("DELETE fROM `participer` WHERE id_Participer = $id_Participer"); 
                  $cmd->execute(array("id_Participer"=>$id_Participer)); 
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
              if(!empty($_POST['id_Participer'])){ 
                try{
                  $id_Participer = $_POST['id_Participer']; 
                  $Module = $_POST['Module']; 
                  $Candidat = $_POST['Candidat']; 
                  $Absence = $_POST['Absence']; 
                  $cmd = $connected->prepare("UPDATE `participer` SET `Module`=:Module, `Candidat`=:Candidat, `Absence`=:Absence WHERE `participe`.`id_Participer`=:id_Participer"); 

                  $cmd->execute(array("id_Participer"=>$id_Participer, ":Module"=>$Module, ":Candidat"=>$Candidat,":Absence"=>$Absence)); 
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
                  <th scope="col" width="25%">Module</th>
                  <th scope="col" width="25%">Candidat</th>
                  <th scope="col" width="20%">Absence</th>
                  <th scope="col" width="20%">#</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                   $cmd = $connected->query("SELECT * FROM `participer` "); 
                         
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>

                        <tr>
                          <th scope="row"><?php  echo $data["id_Participer"]; ?></th>
                          <td><?php  
                                $cmd = $connected->query("SELECT * FROM `module` ");  
                                if($cmd){
                                  while ($data3 = $cmd->fetch()){
                                    echo $data3["Intitule"];
                                  }
                                } ?></td>
                          <td><?php  
                                $cmd = $connected->query("SELECT * FROM `candidat` ");  
                                if($cmd){
                                  while ($data3 = $cmd->fetch()){
                                    echo $data3["Nom"].' '.$data3["Prenom"];
                                  }
                                }
                          ?></td>
                          <td><?php  echo $data["Absence"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_role<?php  echo $data["id_Participer"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_role<?php  echo $data["id_Participer"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_role" aria-hidden="true">
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
                                                  <label for="inputModule" class="col-sm-3 col-form-label">Module :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputModule" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Module"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputCandidat" class="col-sm-3 col-form-label mt-1">Candidat :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputModule" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Candidat"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputAbsence" class="col-sm-3 col-form-label mt-1">Absence :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputModule" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Absence"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDate_debut" class="col-sm-3 col-form-label mt-1">Date_debut :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputModule" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Date_debut"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDate_fin" class="col-sm-3 col-form-label mt-1">Date_fin :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputModule" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Date_fin"];
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_role<?php  echo $data["id_Participer"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_role<?php  echo $data["id_Participer"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modifierrole">Modifier la formation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST" id="roleform">
                                       <div class="modal-body">
                                        <div class="counter">
                                          <div class="row mt-4">
                                            <div class="col-12">
                                              <div class="form-group row"> inserer les nouveaux donnees : 
                                                <input type="text" class="form-control mt-3 hidden" name="id_Participer" id="id_Participer" value="<?php  echo $data["id_Participer"];?>"
                                              ></div>
                                              <div class="form-group row" >
                                                <label for="inputModule" class="col-sm-3 col-form-label">Module :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="Module" class="form-control" id="Module" value="<?php  echo $data["Module"];?>">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputCandidat" class="col-sm-3 col-form-label mt-1">Candidat :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="Candidat" class="form-control mt-3" id="Candidat" value="<?php  echo $data["Candidat"];?>">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputAbsence" class="col-sm-3 col-form-label mt-1">Absence :</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="5" name="Absence" id="Absence"><?php  echo $data["Absence"];?></textarea>
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
                            </div>  

                            <!-- btn-Suppression -->

                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_Participer"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_Participer"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer participation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer cette participation ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_Participer" id="id_Participer" value="<?php  echo $data["id_Participer"];?>">
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
            <button type="reset" class="btn btn-dark" onclick='document.getElementById("Module").focus();'>
              <i class="bx bx-x"></i>  <a href="index.php" style="color: white;">retour</a>
            </button>
            <button type="button" class="btn btn-primary" name="btn_enregistrer" id="btn_enregistrer">
              <i class="bx bxs-plus-square"></i> <a href="page.php?lien=add_participer" style="color: white;">ajouter une participation</a>  
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->