<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des operations</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des operations</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des operations </div>
          <div class="card-body mt-5">  

            <?php 
            if(isset($_POST['btn_supprimer'])){
              if(!empty($_POST['id_Operation'])){ 
                try{
                  $id_Operation = $_POST['id_Operation']; 
                  $cmd = $connected->prepare("DELETE fROM `operation` WHERE id_Operation = $id_Operation"); 
                  $cmd->execute(array("id_Operation"=>$id_Operation)); 
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
              if(!empty($_POST['id_Operation'])){ 
                try{
                  $id_Operation = $_POST['id_Operation']; 
                  $Utilisateur = $_POST['Utilisateur']; 
                  $Name_table = $_POST['Name_table']; 
                  $id_enregistrement = $_POST['id_enregistrement'];
                  $Type = $_POST['Type'];
                  $Date = $_POST['Date'];

                  $cmd = $connected->prepare("UPDATE `formateur` SET `Utilisateur`=:Utilisateur, `Name_table`=:Name_table, `id_enregistrement`=:id_enregistrement, `Type`=:Type, `Date`=:Date WHERE `formateur`.`id_Operation`=:id_Operation"); 
                  $cmd->execute(array(":id_Operation"=>$id_Operation, ":Utilisateur"=>$Utilisateur, ":Name_table"=>$Name_table, ":id_enregistrement"=>$id_enregistrement, ":Type"=>$Type, ":Date"=>$Date)); 

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
                  <th scope="col" width="25%">Utilisateur</th>
                  <th scope="col" width="20%">Name_table</th>
                  <th scope="col" width="25%">id_enregistrement</th>
                  <th scope="col" width="20%">#</th>
                </tr>
                <?php 

                   $cmd = $connected->query("SELECT * FROM `operation` "); 
                         
                    if($cmd){
                      while ($data = $cmd->fetch()){
                ?>

                <tr>
                          <th scope="row"><?php  echo $data["id_Operation"]; ?></th>
                          <td><?php  echo $data["Utilisateur"]; ?></td>
                          <td><?php  echo $data["Name_table"]; ?></td>
                          <td><?php  echo $data["id_enregistrement"]; ?></td>
                          <td class="text-center">

                            <!-- btn-Details -->
                            <button type="button" class="btn btn-secondary" name="btn-Details" id="btn-Details" title="Plus de détail" data-toggle="modal" data-target="#detail_Utilisateur<?php  echo $data["id_Operation"];?>">
                              <i class="bi bi-eye-fill"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detail_Utilisateur<?php  echo $data["id_Operation"];?>" tabindex="-1" role="dialog" aria-labelledby="datail_Utilisateur" aria-hidden="true">
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
                                                  <label for="inputUtilisateur" class="col-sm-3 col-form-label">Utilisateur :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputUtilisateur" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Utilisateur"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="inputName_table" class="col-sm-3 col-form-label mt-1">Name_table :</label>
                                                  <div class="col-sm-9">
                                                      <label for="inputName_table" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Name_table"];
                                                       ?>
                                                      </label>
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputid_enregistrement" class="col-sm-3 col-form-label">id_enregistrement :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputid_enregistrement" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["id_enregistrement"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputCIN" class="col-sm-3 col-form-label">Type :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputType" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Type"];
                                                       ?>
                                                      </label> 
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputCIN" class="col-sm-3 col-form-label">Date :</label>
                                                  <div class="col-sm-9">
                                                     <label for="inputDate" class="col-sm-3 col-form-label">
                                                      <?php 
                                                      echo $data["Date"];
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
                            <button type="button" class="btn btn-warning" name="btn-modifier" id="btn-modifier" title="Modifier"  data-toggle="modal" data-target="#modifier_Formateur<?php  echo $data["id_Operation"];?>">
                              <i class="bx bx-edit"></i> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modifier_Formateur<?php  echo $data["id_Operation"];?>" tabindex="-1" role="dialog" aria-labelledby="modifier_Formateur" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate >
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modifierrole">Modifier l'operation num <input type="text" class="form-control hidden" name="id_Operation" id="id_Operation" value="<?php echo $data["id_Operation"] ?>"></h5>
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
                                                  <label for="inputUtilisateur" class="col-sm-3 col-form-label">Utilisateur :</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-select" id="validationDefault04" name="Devision" id="Devision" required="">
                                                      <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                                                      <?php  

                                                        $cmd = $connected->query("SELECT * FROM `utilisateur` ");  
                                                        if($cmd){
                                                          while ($dat = $cmd->fetch()){?> 
                                                            <option value="<?php  echo $dat["id_Utilisateur"]; ?>"><?php  echo $dat["Nom"].' '.$dat["Prenom"] ?></option><?php  
                                                          }
                                                        }
                                                      ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                  <label for="inputName_table" class="col-sm-3 col-form-label">Name_table :</label>
                                                  <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="Name_table" id="Name_table" placeholder="Entrer le  Name_table...">
                                                  </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputid_enregistrement" class="col-sm-3 col-form-label">id_enregistrement :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="id_enregistrement" id="id_enregistrement" placeholder="Entrer id_enregistrement...">
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputType" class="col-sm-3 col-form-label">Type d'operation</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="Type" id="Type" placeholder="Entrer le type d'operation">
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="inputDate" class="col-sm-3 col-form-label">Date :</label>
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control" name="Date" id="Date" placeholder="Entrer la date d'operation">
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
                            <button type="button" class="btn btn-danger" name="btn-Suppression" id="btn-Suppression" title="Modifier" data-toggle="modal" data-target="#suprrimer_role<?php  echo $data["id_Operation"];?>">
                              <i class="bx bx-trash"></i>
                            </button>  
                            <!-- Modal -->
                            <div class="modal fade" id="suprrimer_role<?php  echo $data["id_Operation"];?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_role" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="supprimer_role">Suprrimer l'operation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Voulez-vous vraiment supprimer l'operation <?php  echo $data["Name_table"];?> ?
                                      <input type="text" class="form-control mt-3 hidden" name="id_Operation" id="id_Operation" value="<?php  echo $data["id_Operation"];?>">
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
              <i class="bx bxs-plus-square"></i><a href="page.php?lien=add_operation" style="color: white;">ajouter une operation</a>
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->    
