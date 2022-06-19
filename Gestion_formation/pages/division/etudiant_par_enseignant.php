
<?php require_once 'pages/admin/header_admin.php'; ?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des participations</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des participations</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">



      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des etudiant par enseignant  </div>

          <div class="card-body mt-5">  
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
               
                  <th scope="col" width="25%">Nom_etudient</th>
                  <th scope="col" width="20%">Prenom_etud</th>
                  <th scope="col" width="25%">Nom_enseignant</th>
                  <th scope="col" width="20%">Prenom_enseignant</th>
                  <th scope="col" width="10%">#</th>


                </tr>
              </thead>
              <tbody>
                
                         
                 <?php 

                   $cmd = $connected->query("SELECT etudient.nom,etudient.prenom,enseignat.Nom,enseignat.Prénom from etudient,enseignat 
where etudient.id_ens=enseignat.id_ens
order by enseignat.Nom"); 
                    
                    if($cmd){
                      while ($data = $cmd->fetch()){
               
?>
                        <tr>
                         
                           <td><?php  echo $data["nom"];?></td>
                           <td><?php echo $data["prenom"];?></td>
                           <td><?php echo $data["Nom"];?></td>
                           <td><?php echo $data["Prénom"];?></td>
                             <td> </td>
                          
                        
                         </tr>

                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_role<?php  echo $data["id_etudiant"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_role<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="detail_role" aria-hidden="true">
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
                                                  <label for="inputnom" class="col-sm-3 col-form-label">nom :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputIntitule" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["nom"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputprenom" class="col-sm-3 col-form-label mt-1">prenom :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputnom" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["prenom"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputNom" class="col-sm-3 col-form-label mt-1">Nom :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputnom" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Nom"];
                                                         ?>
                                                        </label>
                                                  </div>  
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputPrénom" class="col-sm-3 col-form-label mt-1">Prénom :</label>
                                                  <div class="col-sm-9">
                                                    <label for="inputnom" class="col-sm-3 col-form-label">
                                                        <?php 
                                                        echo $data["Prénom"];
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_role<?php  echo $data["id_etudiant"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_role<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_role" aria-hidden="true">
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
                                              
                                                  
                                                  <div class="form-group row"> inserer les nouveaux donnees du stage : <?php  echo $data["nom"];?> 

                                                  <input type="text" class="form-control mt-3 hidden" name="id_etudiant" id="id_etudiant" value="<?php  echo $data["id_etudiant"];?>"></div>
                                                  <div class="form-group row" >
                                                    <label for="inputnom" class="col-sm-3 col-form-label">nom :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nom" class="form-control" id="nom" value="<?php  echo $data["nom"];?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="inputprenom" class="col-sm-3 col-form-label mt-1">prenom :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="prenom" class="form-control mt-3" id="prenom" value="<?php  echo $data["prenom"];?>">
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

                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_etudiant"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_etudiant"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
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
                                      Voulez-vous vraiment supprimer le role <?php  echo $data["nom"];?> ?
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
               
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-dark" onclick='document.getElementById("nom").focus();'>
              <i class="bx bx-x"></i>  <a href="index.php?" style="color: white;">retour</a>
            </button>
            
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 
	