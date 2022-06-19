<?php
 require_once 'pages/admin/header_admin.php'; ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des stages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des stages</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">



      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des stages  </div>

     

        

              

          <div class="card-body mt-5">  
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th>
                  <th scope="col" width="25%">etudiant</th>
                  <th scope="col" width="10%">binome</th>
                  <th scope="col" width="35%">note</th>
                  <th scope="col" width="20%">#</th>
                </tr>
              </thead>
              <h3>La visualisation des etudients avec leurs binomes et la note du rapport</h3>
              <tbody>
                <?php 

                   $cmd = $connected->query("select stage.id_stage, stage.nom_binome,stage.prenom_binome,stage.note, etudient.prenom,etudient.nom FROM `etudient`,`stage` 
where stage.id_etudiant=etudient.id_etudiant"); 
                    
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>

                        <tr>
                          <th scope="row"><?php  echo $data["id_stage"]; ?></th>
                           <td><?php  echo $data["nom"].''. $data["prenom"];?></td>
                          <td><?php  echo $data["nom_binome"].' '.$data["prenom_binome"];?></td>
                          <td><?php  echo $data["note"]; ?></td>
                         

                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_role<?php  echo $data["id_stage"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_role<?php  echo $data["id_stage"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_role" aria-hidden="true">
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
                                                  <label for="inputIntitule" class="col-sm-3 col-form-label">Intitule :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputIntitule" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Intitule"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputAnnonce" class="col-sm-3 col-form-label mt-1">Annonce :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputIntitule" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Annonce"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDate_debut" class="col-sm-3 col-form-label mt-1">Date_debut :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputIntitule" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Date_debut"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDate_fin" class="col-sm-3 col-form-label mt-1">Date_fin :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputIntitule" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Date_fin"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputDescription" class="col-sm-3 col-form-label mt-1">Description :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputIntitule" class="col-sm-3 col-form-label">
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_role<?php  echo $data["id_stage"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_role<?php  echo $data["id_stage"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modifierrole">Modifier la stage</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST" id="roleform">
                                       <div class="modal-body">
                                        <div class="counter">
                                          <div class="row mt-4">
                                            <div class="col-12">
                                              
                                                  
                                                  <div class="form-group row"> inserer les nouveaux donnees du stage : <?php  echo $data["Intitule"];?> 

                                                  <input type="text" class="form-control mt-3 hidden" name="id_stage" id="id_stage" value="<?php  echo $data["id_stage"];?>"></div>
                                                  <div class="form-group row" >
                                                    <label for="inputIntitule" class="col-sm-3 col-form-label">Intitule :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="intitule" class="form-control" id="intitule" value="<?php  echo $data["Intitule"];?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="inputAnnonce" class="col-sm-3 col-form-label mt-1">Annonce :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Annonce" class="form-control mt-3" id="Annonce" value="<?php  echo $data["Annonce"];?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="inputDescription" class="col-sm-3 col-form-label mt-1">Description :</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" name="description" id="description"><?php  echo $data["Description"];?></textarea>
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

                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_stage"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_stage"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
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
                                      Voulez-vous vraiment supprimer le role <?php  echo $data["Intitule"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_stage" id="id_stage" value="<?php  echo $data["id_stage"];?>">
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
            <button type="reset" class="btn btn-dark" onclick='document.getElementById("intitule").focus();'>
              <i class="bx bx-x"></i>  <a href="index.php?" style="color: white;">retour</a>
            </button>
            
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->