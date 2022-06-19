
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'une participation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter une participation</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php 
    if(isset($_POST['btn_enregistrer'])){
      var_dump($_POST);
      if(!empty($_POST['Module']) && !empty($_POST['Candidat']) && !empty($_POST['Date_debut']) && !empty($_POST['Date_fin']) && !empty($_POST['Absence'])){ 

        try{

          $Module = $_POST['Module']; 
          $Candidat =  $_POST['Candidat'];
          $Date_debut =  $_POST['Date_debut']; 
          $Date_fin =  $_POST['Date_fin']; 
          $Absence =  $_POST['Absence']; 

          $cmd = $connected->prepare("INSERT INTO `participer` (`Candidat`, `Module`, `Date_debut`, `Date_fin`, `Absence`) VALUES (:Candidat,:Module,:Date_debut,:Date_fin,:Absence)"); 
          $cmd->execute(array(":Candidat"=>$Candidat, ":Module"=>$Module, ":Date_debut"=>$Date_debut, ":Date_fin"=>$Date_fin, ":Absence"=>$Absence)); 

          if($cmd == true){ ?>
            <div class="alert alert-success" role="alert">
              L'ajout à été effectuer avec succés
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

  <section class="section dashboard">  
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter une participation  </div>
          <div class="card-body mt-5">
            <div class="form-group row" >
                <label for="inputModule" class="col-sm-3 col-form-label">Module :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Module" id="Module" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `module` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Module"]; ?>"><?php  echo $data["Intitule"]?></option><?php  
                        }
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputCandidat" class="col-sm-3 col-form-label">Candidat :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Candidat" id="Candidat" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `candidat` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Candidat"]; ?>"><?php  echo $data["Nom"].' '.$data["Prenom"] ?></option><?php  
                        }
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputAbsence" class="col-sm-3 col-form-label">Absence :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Absence" id="Absence" placeholder="Entrer l'Absence...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputDate_debut" class="col-sm-3 col-form-label">Date_debut :</label>
                
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="Date_debut" id="Date_debut">
                </div>            </div>
            <div class="form-group row" >
                <label for="inputDate_fin" class="col-sm-3 col-form-label">Date_fin :</label>
                
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="Date_fin" id="Date_fin">
                </div>
            </div>
            
            <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("Module").focus();'>
              <i class="bx bx-x"></i>  Annuler
            </button>
            <button type="submit" class="btn btn-success" name="btn_enregistrer" id="btn_enregistrer">
              <i class="bx bxs-plus-square"></i>  Enregistrer
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->